

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>Polling Unit</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/pricing/">





    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>


    <!-- Custom styles for this template -->
    <link href="pricing.css" rel="stylesheet">
  </head>
  <body>



<div class="container py-3">
  <header>
    <div class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom">

      <nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
        <a class="me-3 py-2 text-dark text-decoration-none" href="/">Home</a>
        <a class="me-3 py-2 text-dark text-decoration-none" href="/pollingunit">Individual Polling Unit</a>
        <a class="me-3 py-2 text-dark text-decoration-none" href="/store">Add New Entry</a>

      </nav>
    </div>


  <div class="row row-cols-1 row-cols-md-3 mb-3 text-center mt-4">

    <div class="col">
      <div class="card mb-4 rounded-3 shadow-sm border-white">

      </div>
    </div>

    <div class="col">
      <div class="card mb-4 rounded-3 shadow-sm border-dark">
        <div class="card-header py-3 ">
            <select class="form-select form-select-lg mb-3 center" aria-label=".form-select-lg example">
                <option selected>Choose Local Govt</option>
                <option value="1">Aniocha North</option>

              </select>
          </div>

      </div>
    </div>

    <div class="col">
      <div class="card mb-4 rounded-0 shadow-sm border-white">

      </div>
    </div>





      </div>

    <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
      <h1 class="display-4 fw-normal">{{$get_lga}}</h1>
      <p class="fs-5 text-muted">Total Sum of all Polling Unit Result</p>
    </div>
  </header>

  <main>
    <div class="row row-cols-1 row-cols-md-4 mb-3 text-center">

      <div class="col">
        <div class="card mb-4 rounded-3 shadow-sm border-primary">
          <div class="card-header py-3 text-bg-primary border-primary">
            <h6 class="my-0 fw-normal">{{$one_unit_name}}</h5>
          </div>
          <div class="card-body">
            <h1 class="card-title pricing-card-title">{{$one}}</small></h1>

          </div>
        </div>
      </div>

      <div class="col">
        <div class="card mb-4 rounded-3 shadow-sm border-primary">
          <div class="card-header py-3 text-bg-primary border-primary">
            <h6 class="my-0 fw-normal">{{$two_unit_name}}</h6>
          </div>
          <div class="card-body">
            <h1 class="card-title pricing-card-title">{{$two}}</small></h1>

          </div>
        </div>
      </div>

      <div class="col">
        <div class="card mb-4 rounded-3 shadow-sm border-primary">
          <div class="card-header py-3 text-bg-primary border-primary">
            <h6 class="my-0 fw-normal">{{$three_unit_name}}</h6>
          </div>
          <div class="card-body">
            <h1 class="card-title pricing-card-title">{{$three}}</small></h1>

          </div>
        </div>
      </div>

      <div class="col">
        <div class="card mb-4 rounded-3 shadow-sm border-primary">
          <div class="card-header py-3 text-bg-primary border-primary">
            <h6 class="my-0 fw-normal">{{$four_unit_name}}</h6>
          </div>
          <div class="card-body">
            <h1 class="card-title pricing-card-title">{{$four}}</small></h1>

          </div>
        </div>
      </div>




    </div>

    <div class="row row-cols-1 row-cols-md-3 mb-3 text-center mt-4">

        <div class="col">
          <div class="card mb-4 rounded-3 shadow-sm border-dark">

          </div>
        </div>

        <div class="col">
          <div class="card mb-4 rounded-3 shadow-sm border-dark">


            <div class="card-header py-3 text-bg-dark border-dark">
                <h5 class="my-0 fw-normal">Total Sum of Polling Unit at {{$get_lga}}</h5>
              </div>
              <div class="card-body">
                <h1 class="card-title pricing-card-title">{{$sum}}</small></h1>

              </div>



          </div>
        </div>

        <div class="col">
          <div class="card mb-4 rounded-3 shadow-sm border-dark">

          </div>
        </div>




      </div>



  </main>


</div>



  </body>
</html>





