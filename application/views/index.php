<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a class="navbar-brand" href="/">
                <h3>GESPORT</h3>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Acerca de nosotros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Eventos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Escenarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Clubes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contacto</a>
                    </li>
                </ul>
            </div>
    </nav>
    <header>
        <div class="background">
            <div class="overlay text-white">
                <div class="row px-5 py-5">
                    <div class="col-md-7 header-content-left text-center justify-content-center align-self-center">
                        <h1>Deporte y Recreación para Todos</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex doloribus fugit hic amet laborum necessitatibus praesentium, sit vero, quidem quibusdam provident ducimus. Corporis, consectetur? Vero tempora mollitia repellendus alias quibusdam.</p>
                        <button class="btn btn-outline-primary text-white btn-lg">Leer mas</button>
                    </div>
                    <div class="col-md-4 header-content-right">
                        <h3>Solicita un escenario para entrenar</h3>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Cédula">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Nombre">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Teléfono">
                        </div>
                        <div class="form-group">
                            <select name="" class="form-control" placeholder="Cuantos Deportistas" id="">
                                <option value="1">Cuantos Deportistas?</option>
                                <option value="2">2</option>
                                <option value="">3</option>
                                <option value="">4</option>
                                <option value="">5</option>
                                <option value="">...</option>
                            </select>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="fechaini">Fecha Inicio</label>
                                <input type="date" id="fechaini" class="form-control">
                                <label for="">Hora inicio</label>
                                <input type="time" id="horaini" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="fechafin">Fecha Fin</label>
                                <input type="date" id="fechafin" class="form-control">
                                <label for="">Hora fin</label>
                                <input type="time" id="horafin" class="form-control">
                            </div>
                        </div>
                        <button class="btn btn-outline-success btn-lg btn-block text-white">Solicitar</button>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <section id="eventos">
      <div class="container-fluid mt-5">
        <h1 class="display-4 text-center">Clubes</h1>
        <div class="row mt-5">

            <div class="col-md-3">
              <div class="card" style="width: 18rem;">
                  <img class="card-img-top" src="img/basket.jpg" alt="baloncesto">
                  <div class="card-body">
                    <h5 class="card-title">Club de baloncesto</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item"><i class="fas fa-user"></i>20 deportistas</li>
                    <li class="list-group-item"><i class="fas fa-basketball-ball"></i>Club de Futbol</li>
                  </ul>
                  <div class="card-body">
                    <a href="#" class="card-link">Suscribirse</a>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="img/futbol.jpg" alt="baloncesto">
                    <div class="card-body">
                      <h5 class="card-title">Club de futbol</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item"><i class="fas fa-user"></i>10 deportistas</li>
                      <li class="list-group-item"><i class="fas fa-basketball-ball"></i>Club de Futbol</li>
                    </ul>
                    <div class="card-body">
                      <a href="#" class="card-link">Suscribirse</a>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="card" style="width: 18rem;">
                      <img class="card-img-top" src="img/patinaje.jpg" alt="baloncesto">
                      <div class="card-body">
                        <h5 class="card-title">Club de patinaje</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      </div>
                      <ul class="list-group list-group-flush">
                        <li class="list-group-item"><i class="fas fa-user"></i>15 deportistas</li>
                        <li class="list-group-item"><i class="fas fa-basketball-ball"></i>Club de Patinaje</li>
                      </ul>
                      <div class="card-body">
                        <a href="#" class="card-link">Suscribirse</a>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="img/natacion.jpg" alt="baloncesto">
                        <div class="card-body">
                          <h5 class="card-title">Club de natación</h5>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                        <ul class="list-group list-group-flush">
                          <li class="list-group-item"><i class="fas fa-user"></i>20 deportistas</li>
                          <li class="list-group-item"><i class="fas fa-basketball-ball"></i>Club de natación</li>
                        </ul>
                        <div class="card-body">
                          <a href="#" class="card-link">Suscribirse</a>
                        </div>
                      </div>
                    </div>
          </div>

        </div>
        <button type="button" class="btn btn-success btn-lg text-center">Ver todo los clubes</button>
    </section>
    <section id="info" class="bg-info">
        <div class="container-fluid mt-5">
          <h2 class="text-center text-light my-4">Escenarios disponibles</h2>
            <div class="row">
              <div class="col-sm-3">
                <div class="card" style="width: 18rem;">
                  <img class="card-img-top" src="img/sc2.jpg" alt="Card image cap">
                  <div class="card-body">
                    <h5 class="card-title">9:00am - 11:00</h5>
                    <p class="card-text">Coliseo Mayor</p>
                    <a href="#" class="btn btn-primary">Reservar</a>
                  </div>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="card" style="width: 18rem;">
                  <img class="card-img-top" src="img/sc3.jpg" alt="Card image cap">
                  <div class="card-body">
                    <h5 class="card-title">1:00pm - 3:00</h5>
                    <p class="card-text">Cancha Micro del bosque</p>
                    <a href="#" class="btn btn-primary">Reservar</a>
                  </div>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="card" style="width: 18rem;">
                  <img class="card-img-top" src="img/sc1.jpg" alt="Card image cap">
                  <div class="card-body">
                    <h5 class="card-title">4:25pm - 5:30</h5>
                    <p class="card-text">Patinodromo palogrande</p>
                    <a href="#" class="btn btn-primary">Reservar</a>
                  </div>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="card" style="width: 18rem;">
                  <img class="card-img-top" src="img/sc4.jpg" alt="Card image cap">
                  <div class="card-body">
                    <h5 class="card-title">8:00am - 11:30</h5>
                    <p class="card-text">Complejo acuatico el bosque</p>
                    <a href="#" class="btn btn-primary">Reservar</a>
                  </div>
                </div>
              </div>
              <div class="col-sm-2"></div>
              <div class="col-sm-2"></div>
              <div class="col-sm-2"></div>
              <div class="col-sm-2"></div>
              <div class="col-sm-2"></div>
              <div class="col-sm-2"></div>
              <div class="col-sm-2"></div>
              <div class="col-sm-2"></div>
              <div class="col-sm-2"></div>
              <div class="col-sm-2"></div>
              <div class="col-sm-2"></div>
              <div class="col-sm-2"></div>
            </div>
        </div>
    </section>
</body>
</html>
