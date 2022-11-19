<?php
define('IN_MY_PROJECT', true);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <title>Varia's Venues</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

  <!-- Styles -->
  <link rel="stylesheet" href="/css/style.css">
  <script defer src="/javascript/script.js"></script>
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <div class="container">
      <a href="#" class="navbar-brand">Varia's Venues</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbar">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a href="#link1" class="nav-link">About Us</a>
          </li>
          <li class="nav-item">
            <a href="#link2" class="nav-link">Contact</a>
          </li>
          <li class="nav-item">
            <a href="#link2" class="nav-link">Reviews</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Showcase -->
  <section class="bg-dark text-light p-5 text-center">
    <div class="container">
      <div class="row">
        <div class="col-sm">
          <h1>Plan Your Dream Wedding</h1>
        </div>
        <div class="col-sm">
          <h5>
            Trusted, bespoke and high quality wedding planning to make your dream day transform from an idea to
            reality
          </h5>
        </div>
      </div>
    </div>
  </section>

  <!-- Bootstrap Carousel -->
  <section class="bg-secondary text-dark p-1 text-center">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm p-3 text-light">
          <h2>Featured Venues</h2>
        </div>
      </div>

      <div class="row">
        <div id="carouselExampleControls" class="carousel" data-bs-ride="carousel" data-interval="true">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <div class="card">
                <img src="/images/Central Plaza.jpg" alt="image" class="card-img-top" />
                <div class="card-body">
                  <h4>Central Plaza</h4>
                </div>
              </div>
            </div>

            <div class="carousel-item">
              <div class="card">
                <img src="/images/Pacific Towers Hotel.jpg" alt="image" class="card-img-top" />
                <div class="card-body">
                  <h4>Pacific Towers Hotel</h4>
                </div>
              </div>
            </div>

            <div class="carousel-item">
              <div class="card">
                <img src="/images/Sky Center Complex.jpg" alt="image" class="card-img-top" />
                <div class="card-body">
                  <h4>Sky Center Complex</h4>
                </div>
              </div>
            </div>

            <div class="carousel-item">
              <div class="card">
                <img src="/images/Sea View Tavern.jpg" alt="image" class="card-img-top" />
                <div class="card-body">
                  <h4>Sea View Tavern</h4>
                </div>
              </div>
            </div>

            <div class="carousel-item">
              <div class="card">
                <img src="/images/Ashby Castle.jpg" alt="image" class="card-img-top" />
                <div class="card-body">
                  <h4>Ashby Castle</h4>
                </div>
              </div>
            </div>

            <div class="carousel-item">
              <div class="card">
                <img src="/images/Fawlty Towers.jpg" alt="image" class="card-img-top" />
                <div class="card-body">
                  <h4>Fawlty Towers</h4>
                </div>
              </div>
            </div>

            <div class="carousel-item">
              <div class="card">
                <img src="/images/Hilltop Mansion.jpg" alt="image" class="card-img-top" />
                <div class="card-body">
                  <h4>Hilltop Mansion</h4>
                </div>
              </div>
            </div>

            <div class="carousel-item">
              <div class="card">
                <img src="/images/Haslegrave Hotel.jpg" alt="image" class="card-img-top" />
                <div class="card-body">
                  <h4>Haslegrave Hotel</h4>
                </div>
              </div>
            </div>

            <div class="carousel-item">
              <div class="card">
                <img src="/images/Forest Inn.jpg" alt="image" class="card-img-top" />
                <div class="card-body">
                  <h4>Forest Inn</h4>
                </div>
              </div>
            </div>

            <div class="carousel-item">
              <div class="card">
                <img src="/images/Southwestern Estate.jpg" alt="image" class="card-img-top" />
                <div class="card-body">
                  <h4>Southwestern Estate</h4>
                </div>
              </div>
            </div>
          </div>

          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>

          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
    </div>
  </section>

  <!-- Search Form -->
  <section class="bg-dark text-light p-3">
    <div class="container-fluid">
      <div class="row text-center">
        <h2>Find Venues</h2>
      </div>

      <form id="input_form" class="form-inline">
        <div class="input-group">
          <div class="row justify-content-center">
            <div class="col-sm-12">
              <div class="form-group">
                <label for="start-date" class="input-label">Start Date</label>
                <input type="date" class="form-control" id="start-date" required />
              </div>
            </div>

            <div class="col-sm-12">
              <div class="form-group">
                <label for="end-date" class="input-label">End Date</label>
                <input type="date" class="form-control" id="end-date" />
              </div>
            </div>

            <div class="col-sm-6">
              <div class="form-group">
                <label for="party-size" class="input-label">Party Size</label>
                <input type="number" class="form-control" id="party-size" min="0" max="1000" required />
              </div>
            </div>

            <div class="col-sm-6">
              <div class="form-group">
                <label for="sel1">Catering Grade:</label>
                <select class="form-control" id="catering-grade">
                  <option>C1</option>
                  <option>C2</option>
                  <option>C3</option>
                  <option>C4</option>
                  <option>C5</option>
                </select>
              </div>
            </div>

            <div class="col-sm-2 p-4">
              <button type="submit" class="btn btn-light" id="submit">Search</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </section>

  <!-- Results -->

  <section>
    <div class="container-fluid bg-secondary text-light">
      <div id="results-heading" class="row text-center" hidden="true">
        <h1>Results</h1>
      </div>

      <div id="container" class="row text-center text-dark flex justify-content-center"></div>
    </div>
  </section>

  <!-- Footer -->

  <footer class="bg-dark text-center text-light text-lg-start">
    <div class="text-center p-3">© 2022 Copyright: Varia's Venues</div>
  </footer>

  <!-- jquery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <!-- bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>