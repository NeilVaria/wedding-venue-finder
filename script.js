//adjusts how the bootstrap carousel works so that more than 1 card can be displayed at once
var multipleCardCarousel = document.querySelector("#carouselExampleControls");
if (window.matchMedia("(min-width: 768px)").matches) {
  var carousel = new bootstrap.Carousel(multipleCardCarousel, {
    interval: false,
  });
  var carouselWidth = $(".carousel-inner")[0].scrollWidth;
  var cardWidth = $(".carousel-item").width();
  var scrollPosition = 0;
  $("#carouselExampleControls .carousel-control-next").on("click", function () {
    if (scrollPosition < carouselWidth - cardWidth * 4) {
      scrollPosition += cardWidth;
      $("#carouselExampleControls .carousel-inner").animate(
        { scrollLeft: scrollPosition },
        600
      );
    }
  });
  $("#carouselExampleControls .carousel-control-prev").on("click", function () {
    if (scrollPosition > 0) {
      scrollPosition -= cardWidth;
      $("#carouselExampleControls .carousel-inner").animate(
        { scrollLeft: scrollPosition },
        600
      );
    }
  });
} else {
  $(multipleCardCarousel).addClass("slide");
}


//gathers the catering input information to be used in a later function
catering = document.getElementById("catering-grade");
catering_val = 1;

//finds todays date so that the forms minimum input date can be set to today
var today = new Date();
var dd = String(today.getDate()).padStart(2, '0');
var mm = String(today.getMonth() + 1).padStart(2, '0');
var yyyy = today.getFullYear();
today = yyyy + '-' + mm + '-' + dd;
document.getElementById("start-date").min = today; //sets the min start date to today on the input form


//formats dates into the format required in the html form
const formatDate = (date) => {
  let d = new Date(date);
  let month = (d.getMonth() + 1).toString();
  let day = d.getDate().toString();
  let year = d.getFullYear();
  if (month.length < 2) {
    month = "0" + month;
  }
  if (day.length < 2) {
    day = "0" + day;
  }
  return [year, month, day].join("-"); //returns the formatted date
};


//javascript object for all the variables to be passed into the db.php file
const form = {
  first_date: document.getElementById("start-date"),
  last_date: document.getElementById("end-date"),
  party_size: document.getElementById("party-size"),
  catering_grade: catering_val,
  submit_button: document.getElementById("submit"),
  list_of_dates: [],
};


//converts the catering grade from the input form to the number of the grade to be used in the db.php file
let set_catering = () => {
  if (catering.value == "C1") {
    form.catering_grade = 1;
  }
  if (catering.value == "C2") {
    form.catering_grade = 2;
  }
  if (catering.value == "C3") {
    form.catering_grade = 3;
  }
  if (catering.value == "C4") {
    form.catering_grade = 4;
  }
  if (catering.value == "C5") {
    form.catering_grade = 5;
  }
};
catering.addEventListener("change", set_catering); //when the input is changed, find the new catering grade


//function to set the minimum and maximum dates of the second input form based on the first input form
let set_dates = () => {
  let first_val = new Date(form.first_date.value)
  first_val = formatDate(first_val);
  let incremented_date = new Date(form.first_date.value);
  incremented_date.setDate(incremented_date.getDate()+7); //increments the first date by 7 days
  max_date = formatDate(incremented_date); //formats the date so that it can be used for the form
  document.getElementById("end-date").min = first_val; //stops user entering a second date before the first date
  document.getElementById("end-date").max = max_date; //stops user entering a second date that is more than 7 days after the first date
};
form.first_date.addEventListener("change", set_dates); //when change is detected on the date forms, change the min and max dates
form.last_date.addEventListener("change", set_dates);


//creates an array of dates inbetween the 2 input forms for the db.php file
function listOfDates(first_date, last_date) {
  const date = new Date(first_date);
  const date2 = new Date(last_date);
  const dates = [];
  if (!last_date) return [formatDate(date)] //if there is no second date input, set the array to only contain the formatted first date
  while (date <= date2) { //while the date is not the second date, increment the date and push it to the array of dates
    dates.push(formatDate(date));
    date.setDate(date.getDate() + 1);
  }
  return dates;
}


input_form = document.getElementById("input_form"); //collects the input form so that a function can be run when the form is submitted
input_form.addEventListener("submit", function submitFunction(e) {
    e.preventDefault();
    form.list_of_dates = listOfDates( //create the list of dates from the input
      form.first_date.value,
      form.last_date.value
    );

    document.getElementById("results-heading").hidden = false; //show the results heading

    const json_form = JSON.stringify(form); //convert the javascript object of variables to be passed into db.php into a json
    $.ajax({ //pushes the results to the page without needing to refresh the page
      url: "db.php?first_date="+form.first_date.value+"&last_date="+form.last_date.value+"&party_size="+form.party_size.value+"&catering_grade="+form.catering_grade+"&list_of_dates="+form.list_of_dates, //pass the variables into the db.php
      type: "POST", 
      data: json_form,
      success: function (data) { //
        makeCard(data); //function to create the cards is called
      },
      error: function (e) {
        console.log(e.message);
      },
    });
  }
);


function makeCard(data){
  data = JSON.parse(data); //converts the string returned from db.php into an object
  const container = document.getElementById('container'); //selects the div to put the cards into
  container.innerHTML=""; //clears the div to show new results

  for (const [day, venues] of Object.entries(data)){ //seperates the key(the date) from the venues and loops through the venues
  const weekday = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]; //array to displaay the day of the week
  day_of_week = weekday[(new Date(day)).getDay()]; //checks which day of the week the day that the cards are being created for is
  container.innerHTML+=`<h5 class="text-light mt-3">${day_of_week}  ${day} </h5}`; //prints a header containing the day of the week and the date
  if (venues.length == 0){
    container.innerHTML+=`<h6 class="text-light">No Results Found!</h6}`; //when no venues are found for that day print "no venues found"
  }
  venues.forEach(day_result => { //loops through the venue to find the data to put onto the card
    const {name, capacity, licensed, cost, weekday_price, weekend_price, count, date} =  day_result //an object for the data received from the db
    totalPrice = 0;
    if ((new Date(day)).getDay() == 0 || (new Date(day)).getDay() == 6){ //if the date is the weekend
      totalPrice = parseInt(weekend_price) + (parseInt(cost)*parseInt(form.party_size.value)); //calculate total cost
    }else{ //when its a week-day
      totalPrice = parseInt(weekday_price) + (parseInt(cost)*parseInt(form.party_size.value)); //calculate total cost
    }
    const card = document.createElement('div'); //create the card with all of the information from the db
    card.classList = 'card-body';
    const content=`
    <div class="card p-1 my-3" style="width: max(30vw, 350px); height: 100%; object-fit: cover;">
    <img class="card-img-top" src="${name}.jpg" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">${name}</h5>
    </div>
    <ul class="list-group list-group-flush">
      <li class="list-group-item">Capacity: ${capacity}</li>
      <li class="list-group-item">Licensed: ${licensed}</li>
      <li class="list-group-item">Catering Cost: ${cost}</li>
      <li class="list-group-item">WeekDay Price: ${weekday_price}</li>
      <li class="list-group-item">WeekEnd Price: ${weekend_price}</li>
      <li class="list-group-item">Total Bookings: ${count}</li>
      <li class="list-group-item">Total Price: ${totalPrice}</li>
    </ul>
  </div>
    `;  
    container.innerHTML += content; //write the card to the html

  });
};
}