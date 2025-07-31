<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TatoPhones - Celulares</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" />

<style>
  :root {
    --primary-dark: #1A2533;
    --primary-hover: #2a3f54;
    --accent-color: #00A896;
    --accent-hover: #007F70;
    --text-light: #F0F4F8;
    --text-dark: #222222;
    --card-bg: rgba(255, 255, 255, 0.98);
    --font-main: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  }

  body {
    font-family: var(--font-main);
    background: url("BackgroundImg.png") no-repeat center/cover fixed;
    min-height: 100vh;
    margin: 0;
    position: relative;
    display: flex;
    flex-direction: column;
  }

  body::before {
    content: "";
    position: fixed;
    top: 0; left: 0;
    width: 100%; height: 100%;
    background-color: rgba(0, 0, 0, 0.55);
    z-index: -1;
  }

  #navbar {
    position: fixed;
    width: 100%;
    top: 0; left: 0;
    z-index: 1030;
    transition: background-color 0.4s ease-in-out;
    background-color: transparent;
  }

  #navbar.scrolled {
    background-color: var(--primary-dark);
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
  }
  
  .navbar-brand, .nav-link { text-shadow: 1px 1px 3px rgba(0,0,0,0.5); }
  .logo-nav { margin-right: 10px; border-radius: 8px; }
  .nav-item a { color: rgba(255, 255, 255, 0.9); transition: transform 0.2s ease-in-out, color 0.2s ease; }
  .nav-item a:hover, .nav-link.active { transform: scale(1.1); color: var(--text-light) !important; text-shadow: 0 0 5px rgba(255,255,255,0.5); }

  .main-content {
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
    color: var(--text-light);
    text-align: center;
    padding-top: 56px;
  }
  
  .bienvenida h1, .bienvenida p, .product-section h1 { text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.8); }
  .bienvenida h1 { font-size: 3.5rem; font-weight: bold; }
  
  .product-section { padding: 80px 0; position: relative; z-index: 1; }
  .product-section h1 { color: var(--text-light); }
  .product-section.bg-light h1 { color: var(--text-dark); text-shadow: none; }
  
  /* --- Animaciones de entrada --- */
  .welcome-text, .card { opacity: 0; }
  .welcome-text { transform: translateY(20px); transition: opacity 0.6s ease-out, transform 0.6s ease-out; }
  .card { transform: translateY(30px); }
  .welcome-text.visible, .card.visible { opacity: 1; transform: translateY(0); }
  /* --- Fin Animaciones --- */

  .splide__slide { padding: 10px; }
  .card {
    background-color: var(--card-bg);
    border: none;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
    transition: opacity 0.5s ease-out, transform 0.5s ease-out, box-shadow 0.3s ease;
    border-radius: 1rem;
    overflow: hidden;
    height: 100%;
    display: flex;
    flex-direction: column;
  }
  .card:hover { transform: translateY(-8px); box-shadow: 0 12px 24px rgba(0, 0, 0, 0.25); }
  .card-img-top { height: 200px; object-fit: contain; padding: 10px; background-color: #fff; cursor: pointer; }
  .card-body { padding: 1.25rem; text-align: center; display: flex; flex-direction: column; flex-grow: 1; }
  .card-title { font-weight: bold; min-height: 48px; cursor: pointer; }
  .card-text-price { font-size: 1.2rem; font-weight: 600; color: var(--primary-dark); margin-top: auto; padding-top: 1rem; }
  
  .card-action-buttons { margin-top: 1rem; }
  .add-to-cart-btn {
    background-color: var(--accent-color);
    border-color: var(--accent-color);
    transition: background-color 0.2s ease, border-color 0.2s ease;
  }
  .add-to-cart-btn:hover {
    background-color: var(--accent-hover);
    border-color: var(--accent-hover);
  }
  
  .splide__arrow { background: var(--primary-dark); opacity: 0.8; }
  .splide__arrow svg { fill: var(--text-light); }
  .splide__arrow:hover { background: var(--primary-hover); opacity: 1; }
  .splide__pagination__page.is-active { background: var(--primary-dark); }
  
  .modal-body .carousel-item img { max-height: 450px; object-fit: contain; margin: auto; }
  #modal-product-details { padding: 1rem; }
  #modal-product-details p { font-size: 1.1rem; margin-bottom: 0.5rem; }
  #modal-product-price { font-size: 1.5rem; font-weight: bold; color: var(--primary-dark); text-align: center; margin: 1rem 0; }
  .modal-footer { justify-content: center; border-top: none; padding-top: 0; }
  .modal-footer .btn { min-width: 200px; font-size: 1.1rem; }

  #topBtn {
    position: fixed;
    bottom: 30px; right: 30px;
    background-color: var(--primary-dark);
    color: white;
    border: none;
    border-radius: 50%;
    width: 50px; height: 50px;
    font-size: 20px;
    cursor: pointer;
    box-shadow: 0 4px 12px rgba(0,0,0,0.3);
    z-index: 1000;
    transition: opacity 0.3s, transform 0.3s, visibility 0.3s;
    opacity: 0; visibility: hidden;
  }
  #topBtn.visible { opacity: 1; visibility: visible; }
  #topBtn:hover { background-color: var(--primary-hover); transform: translateY(-3px); }
  
  .site-footer {
    background-color: var(--primary-dark);
    color: var(--text-light);
    padding: 2.5rem 0 1.5rem;
    margin-top: auto;
  }
  .site-footer hr { margin: 1rem 0; border-top: 1px solid rgba(255, 255, 255, 0.2); }
  .site-footer a { color: rgba(255, 255, 255, 0.8); text-decoration: none; transition: color 0.3s ease, text-decoration 0.3s ease; }
  .site-footer a:hover { color: var(--text-light); text-decoration: underline; }
  .site-footer h5 { font-weight: bold; margin-bottom: 1.25rem; padding-bottom: 0.5rem; border-bottom: 2px solid var(--accent-color); display: inline-block; }
  .site-footer .social-icon-hover { transition: transform 0.3s ease, color 0.3s ease; }
  .site-footer .social-icon-hover:hover { transform: translateY(-5px) scale(1.1); color: var(--text-light) !important; }

  .cart-item { display: flex; align-items: center; margin-bottom: 1rem; }
  .cart-item img { width: 60px; height: 60px; object-fit: contain; margin-right: 1rem; background-color: white; border-radius: 8px; }
  .cart-item-details { flex-grow: 1; }
  .cart-item-details .name { font-weight: bold; }
  .cart-item-details .price { color: #555; font-size: 0.9rem; }
  .cart-item .btn-remove-item { background: none; border: none; color: #dc3545; font-size: 1.2rem; padding: 0 5px; cursor: pointer; }

  @media (max-width: 768px) {
    body { background-attachment: scroll; }
    .bienvenida h1 { font-size: 2.5rem; }
    .card-img-top { height: 180px; }
    .card-body .card-title { min-height: auto; }
    .site-footer { padding: 1.5rem 15px; text-align: center; }
    .site-footer .text-md-start { text-align: center !important; }
    .site-footer h5 { font-size: 1.1rem; margin-bottom: 0.75rem; padding-bottom: 0.25rem; }
    .site-footer p, .site-footer li { font-size: 0.875rem; }
    .site-footer .mb-4 { margin-bottom: 1.5rem !important; }
    .site-footer .social-icon-hover .fa-2x { font-size: 1.75rem; }
  }
</style>
</head>
<body>
    <nav id="navbar" class="navbar navbar-expand-lg navbar-dark">
      <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center" href="#home-section">
          <img src="tato.jpg" alt="Logo de TatoPhones" width="50" height="40" class="d-inline-block align-text-top logo-nav" />
          TatoPhones
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="#home-section"><i class="fa-solid fa-house"></i> Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#sealed-phones-section"><i class="fa-solid fa-box"></i> Sellados</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#semi-new-phones-section"><i class="fa-solid fa-mobile-screen"></i> Semi Nuevos</a>
            </li>
          </ul>
          <ul class="navbar-nav">
            <li class="nav-item">
                <button class="btn btn-outline-light" type="button" data-bs-toggle="offcanvas" data-bs-target="#shoppingCart" aria-controls="shoppingCart">
                    <i class="fas fa-shopping-cart me-1"></i>
                    Carrito
                    <span class="badge bg-danger rounded-pill" id="cart-count">0</span>
                </button>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    
    <main>
      <section id="home-section" class="main-content">
        <div class="container text-center">
          <div class="bienvenida">
            <h1 id="welcome-title" class="welcome-text">Bienvenidos a TatoPhones</h1>
            <p id="welcome-subtitle" class="welcome-text">Aquí encontrarás Celulares</p>
            <p id="welcome-call-to-action" class="welcome-text">¡Explora nuestras categorías y encuentra el dispositivo perfecto para ti!</p>
          </div>
        </div>
      </section>

      <section id="sealed-phones-section" class="product-section bg-light">
        <div class="container">
          <h1 class="text-center mb-4">Celulares Sellados</h1>
          <div class="splide" id="sealed-carousel" aria-label="Celulares Sellados">
            <div class="splide__track">
              <ul class="splide__list">
                
                <li class="splide__slide">
                  <div class="card" 
                      data-product-id="s1" data-product-name="iPhone 15 - 128Gb" data-product-price="799.00" data-product-currency="USD"
                      data-product-img="https://m.media-amazon.com/images/I/71nvkHnPpZL._UF1000,1000_QL80_.jpg"
                      data-product-details='<li>Chip A16 Bionic</li><li>Pantalla Super Retina XDR</li><li>Dynamic Island</li>'
                      data-product-images='["https://m.media-amazon.com/images/I/71nvkHnPpZL._UF1000,1000_QL80_.jpg"]'
                      data-action-type="paypal">
                    <img src="https://m.media-amazon.com/images/I/71nvkHnPpZL._UF1000,1000_QL80_.jpg" class="card-img-top" alt="iPhone 15">
                    <div class="card-body">
                      <h5 class="card-title">iPhone 15</h5>
                      <p class="card-text-price">$799 USD</p>
                      <div class="card-action-buttons d-grid gap-2">
                          <button class="btn btn-primary add-to-cart-btn">Agregar al Carrito</button>
                          <a href="https://wa.me/59899884367?text=Hola,%20tengo%20una%20consulta%20sobre%20el%20iPhone%2015%20-%20128Gb" target="_blank" class="btn btn-outline-success"><i class="fab fa-whatsapp me-1"></i> Hacer una consulta</a>
                      </div>
                    </div>
                  </div>
                </li>

                <li class="splide__slide">
                    <div class="card"
                        data-product-id="s2" data-product-name="iPhone 16 - 128Gb" data-product-price="899.00" data-product-currency="USD"
                        data-product-img="https://www.iplace.com.uy/ccstore/v1/images/?source=/file/v159283170764321671/products/100053091.00-iphone-16-128gb-negro-mye73be-a.jpg"
                        data-product-details="<li>Nuevo Chip A17</li><li>Diseño renovado</li><li>Cámara con IA mejorada</li>"
                        data-product-images='["https://www.iplace.com.uy/ccstore/v1/images/?source=/file/v159283170764321671/products/100053091.00-iphone-16-128gb-negro-mye73be-a.jpg"]'
                        data-action-type="paypal">
                      <img src="https://www.iplace.com.uy/ccstore/v1/images/?source=/file/v159283170764321671/products/100053091.00-iphone-16-128gb-negro-mye73be-a.jpg" class="card-img-top" alt="iPhone 16">
                      <div class="card-body">
                        <h5 class="card-title">iPhone 16</h5>
                        <p class="card-text-price">$899 USD</p>
                        <div class="card-action-buttons d-grid gap-2">
                            <button class="btn btn-primary add-to-cart-btn">Agregar al Carrito</button>
                            <a href="https://wa.me/59899884367?text=Hola,%20tengo%20una%20consulta%20sobre%20el%20iPhone%2016%20-%20128Gb" target="_blank" class="btn btn-outline-success"><i class="fab fa-whatsapp me-1"></i> Hacer una consulta</a>
                        </div>
                      </div>
                    </div>
                </li>

                <li class="splide__slide">
                    <div class="card" 
                        data-product-id="s3" data-product-name="iPhone 16 Pro - 128Gb" data-product-price="1199.00" data-product-currency="USD"
                        data-product-img="https://www.iplace.com.uy/ccstore/v1/images/?source=/file/v6078268892043934768/products/100053110.00-iphone-16-pro-128gb-titanio-blanco-myne3be-a.jpg&quality=0.8&outputFormat=JPEG"
                        data-product-details="<li>Chip A18 Pro con motor neuronal</li><li>Pantalla Super Retina XDR de 6.3 pulgadas</li><li>Diseño de titanio aeroespacial</li><li>Nuevo Botón de Captura</li>"
                        data-product-images='["https://www.iplace.com.uy/ccstore/v1/images/?source=/file/v6078268892043934768/products/100053110.00-iphone-16-pro-128gb-titanio-blanco-myne3be-a.jpg&quality=0.8&outputFormat=JPEG", "https://media.cnn.com/api/v1/images/stellar/prod/iphone-15-pro-and-pro-max-cnnu-1.jpg?c=16x9&q=h_720,w_1280,c_fill"]'
                        data-action-type="paypal">
                      <img src="https://www.iplace.com.uy/ccstore/v1/images/?source=/file/v6078268892043934768/products/100053110.00-iphone-16-pro-128gb-titanio-blanco-myne3be-a.jpg&quality=0.8&outputFormat=JPEG" class="card-img-top" alt="iPhone 16 Pro">
                      <div class="card-body">
                        <h5 class="card-title">iPhone 16 Pro - 128Gb</h5>
                        <p class="card-text-price">$1,199 USD</p>
                        <div class="card-action-buttons d-grid gap-2">
                          <button class="btn btn-primary add-to-cart-btn">Agregar al Carrito</button>
                          <a href="https://wa.me/59899884367?text=Hola,%20tengo%20una%20consulta%20sobre%20el%20iPhone%2016%20Pro%20-%20128Gb" target="_blank" class="btn btn-outline-success"><i class="fab fa-whatsapp me-1"></i> Hacer una consulta</a>
                        </div>
                      </div>
                    </div>
                </li>

                <li class="splide__slide">
                    <div class="card" 
                        data-product-id="s4" data-product-name="iPhone 16 Pro Max - 256Gb" data-product-price="1399.00" data-product-currency="USD"
                        data-product-img="https://www.iplace.com.uy/ccstore/v1/images/?source=/file/v467745384365134842/products/100053093.00-iphone-16-pro-max-256gb-titanio-negro-mywv3be-a.jpg&quality=0.8&outputFormat=JPEG"
                        data-product-details="<li>Chip A18 Pro con IA avanzada</li><li>Pantalla Super Retina XDR de 6.9 pulgadas</li><li>Cámara Ultra Gran Angular de 48MP</li><li>Zoom Óptico de 5x</li>"
                        data-product-images='["https://www.iplace.com.uy/ccstore/v1/images/?source=/file/v467745384365134842/products/100053093.00-iphone-16-pro-max-256gb-titanio-negro-mywv3be-a.jpg&quality=0.8&outputFormat=JPEG", "https://fscl01.fonpit.de/userfiles/7689948/image/Apple/iPhone_16_Pro/iPhone_16_Pro_Lifestyle_2.jpg"]'
                        data-action-type="paypal">
                      <img src="https://www.iplace.com.uy/ccstore/v1/images/?source=/file/v467745384365134842/products/100053093.00-iphone-16-pro-max-256gb-titanio-negro-mywv3be-a.jpg&quality=0.8&outputFormat=JPEG" class="card-img-top" alt="iPhone 16 Pro Max">
                      <div class="card-body">
                        <h5 class="card-title">iPhone 16 Pro Max - 256Gb</h5>
                        <p class="card-text-price">$1,399 USD</p>
                        <div class="card-action-buttons d-grid gap-2">
                            <button class="btn btn-primary add-to-cart-btn">Agregar al Carrito</button>
                            <a href="https://wa.me/59899884367?text=Hola,%20tengo%20una%20consulta%20sobre%20el%20iPhone%2016%20Pro%20Max%20-%20256Gb" target="_blank" class="btn btn-outline-success"><i class="fab fa-whatsapp me-1"></i> Hacer una consulta</a>
                        </div>
                      </div>
                    </div>
                </li>

              </ul>
            </div>
          </div>
        </div>
      </section>

      <section id="semi-new-phones-section" class="product-section">
        <div class="container">
          <h1 class="text-center mb-4">Celulares Semi Nuevos</h1>
          <div class="splide" id="seminew-carousel" aria-label="Celulares Semi Nuevos">
            <div class="splide__track">
              <ul class="splide__list">
                
                <li class="splide__slide">
                  <div class="card" 
                      data-product-id="u1" data-product-name="iPhone 12 - 64Gb" data-product-price="14000.00" data-product-currency="UYU"
                      data-product-img="https://www.iplace.com.uy/ccstore/v1/images/?source=/file/v3779609783159694324/products/100000173.00-iphone-12-apple-negro-64gb-mgj53lz-a.jpg"
                      data-product-details="<li><b>Condición Batería:</b> 100%</li><li>Excelente estado</li><li>Incluye caja y cable</li>"
                      data-product-images='["https://www.iplace.com.uy/ccstore/v1/images/?source=/file/v3779609783159694324/products/100000173.00-iphone-12-apple-negro-64gb-mgj53lz-a.jpg"]'
                      data-action-type="whatsapp">
                    <img src="https://www.iplace.com.uy/ccstore/v1/images/?source=/file/v3779609783159694324/products/100000173.00-iphone-12-apple-negro-64gb-mgj53lz-a.jpg" class="card-img-top" alt="iPhone 12">
                    <div class="card-body">
                      <h5 class="card-title">iPhone 12 - 64Gb</h5>
                      <p class="card-text-price">$14.000 UYU</p>
                      <div class="card-action-buttons d-grid gap-2">
                        <button class="btn btn-primary add-to-cart-btn">Agregar al Carrito</button>
                        <a href="https://wa.me/59899884367?text=Hola,%20tengo%20una%20consulta%20sobre%20el%20iPhone%2012%20-%2064Gb" target="_blank" class="btn btn-outline-success"><i class="fab fa-whatsapp me-1"></i> Hacer una consulta</a>
                      </div>
                    </div>
                  </div>
                </li>
                
                <li class="splide__slide">
                  <div class="card" 
                      data-product-id="u2" data-product-name="iPhone 13 - 128gb" data-product-price="19000.00" data-product-currency="UYU"
                      data-product-img="https://www.iplace.com.uy/ccstore/v1/images/?source=/file/v4123085329436294294/products/100001652.00-apple-iphone-13-128-gb-blanco-estelar-mlpg-3-lza.jpg"
                      data-product-details="<li><b>Condición Batería:</b> 87%</li><li>Muy buen estado</li><li>Incluye cable</li>"
                      data-product-images='["https://www.iplace.com.uy/ccstore/v1/images/?source=/file/v4123085329436294294/products/100001652.00-apple-iphone-13-128-gb-blanco-estelar-mlpg-3-lza.jpg"]'
                      data-action-type="whatsapp">
                    <img src="https://www.iplace.com.uy/ccstore/v1/images/?source=/file/v4123085329436294294/products/100001652.00-apple-iphone-13-128-gb-blanco-estelar-mlpg-3-lza.jpg" class="card-img-top" alt="iPhone 13">
                    <div class="card-body">
                      <h5 class="card-title">iPhone 13 - 128gb</h5>
                      <p class="card-text-price">$19.000 UYU</p>
                      <div class="card-action-buttons d-grid gap-2">
                        <button class="btn btn-primary add-to-cart-btn">Agregar al Carrito</button>
                        <a href="https://wa.me/59899884367?text=Hola,%20tengo%20una%20consulta%20sobre%20el%20iPhone%2013%20-%20128gb" target="_blank" class="btn btn-outline-success"><i class="fab fa-whatsapp me-1"></i> Hacer una consulta</a>
                      </div>
                    </div>
                  </div>
                </li>

                <li class="splide__slide">
                    <div class="card" 
                        data-product-id="u4" data-product-name="iPhone 14 - 128Gb" data-product-price="24000.00" data-product-currency="UYU"
                        data-product-img="https://www.iplace.com.uy/ccstore/v1/images/?source=/file/v750326862317701829/products/100002384.00-apple-iphone-14-512gb-azul-mpxn3be-a.jpg&quality=0.8&outputFormat=JPEG"
                        data-product-details="<li><b>Condición Batería:</b> 95%</li><li>Impecable, como nuevo</li><li>Caja y cable originales</li>"
                        data-product-images='["https://www.iplace.com.uy/ccstore/v1/images/?source=/file/v750326862317701829/products/100002384.00-apple-iphone-14-512gb-azul-mpxn3be-a.jpg&quality=0.8&outputFormat=JPEG"]'
                        data-action-type="whatsapp">
                      <img src="https://www.iplace.com.uy/ccstore/v1/images/?source=/file/v750326862317701829/products/100002384.00-apple-iphone-14-512gb-azul-mpxn3be-a.jpg&quality=0.8&outputFormat=JPEG" class="card-img-top" alt="iPhone 14">
                      <div class="card-body">
                        <h5 class="card-title">iPhone 14 - 128Gb</h5>
                        <p class="card-text-price">$24.000 UYU</p>
                        <div class="card-action-buttons d-grid gap-2">
                          <button class="btn btn-primary add-to-cart-btn">Agregar al Carrito</button>
                          <a href="https://wa.me/59899884367?text=Hola,%20tengo%20una%20consulta%20sobre%20el%20iPhone%2014%20-%20128Gb%20(Semi%20Nuevo)" target="_blank" class="btn btn-outline-success"><i class="fab fa-whatsapp me-1"></i> Hacer una consulta</a>
                        </div>
                      </div>
                    </div>
                  </li>

              </ul>
            </div>
          </div>
        </div>
      </section>

    </main>
    
    <div class="offcanvas offcanvas-end" tabindex="-1" id="shoppingCart" aria-labelledby="shoppingCartLabel">
        <div class="offcanvas-header border-bottom">
            <h5 class="offcanvas-title" id="shoppingCartLabel">Carrito de Compras</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div id="cart-items-container">
                <p id="empty-cart-message" class="text-center text-muted">Tu carrito está vacío.</p>
            </div>
        </div>
        <div class="offcanvas-footer p-3 border-top">
            <div id="cart-total-container" class="text-end mb-3 fw-bold fs-5"></div>
            <div class="d-grid gap-2">
                <button class="btn btn-success" id="checkout-btn"><i class="fab fa-whatsapp me-2"></i>Finalizar Compra por WhatsApp</button>
                <button class="btn btn-outline-danger" id="clear-cart-btn">Vaciar Carrito</button>
            </div>
        </div>
    </div>

    <div class="modal fade" id="productInfoModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header border-0">
            <h5 class="modal-title" id="productModalLabel"></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div id="modalProductCarousel" class="carousel slide">
              <div class="carousel-inner" id="modal-carousel-images"></div>
              <button class="carousel-control-prev" type="button" data-bs-target="#modalProductCarousel" data-bs-slide="prev"><span class="carousel-control-prev-icon" aria-hidden="true"></span></button>
              <button class="carousel-control-next" type="button" data-bs-target="#modalProductCarousel" data-bs-slide="next"><span class="carousel-control-next-icon" aria-hidden="true"></span></button>
            </div>
            <hr>
            <div id="modal-product-details"></div>
            <p id="modal-product-price"></p>
          </div>
          <div class="modal-footer d-grid gap-2"></div>
        </div>
      </div>
    </div>
    
    <button id="topBtn" title="Volver arriba"><i class="fas fa-arrow-up"></i></button>

<footer class="site-footer">
    <div class="container">
        <div class="row">

            <div class="col-md-4 mb-4 text-center text-md-start">
                <img src="tato.jpg" alt="Logo de TatoPhones" style="width: 50px; height: 40px; border-radius: 8px; margin-bottom: 10px;">
                <h5>TatoPhones</h5>
                <p>Tu tienda de confianza para celulares nuevos y semi-nuevos. Ofrecemos la mejor calidad y precios competitivos, con atención personalizada.</p>
            </div>

            <div class="col-md-4 mb-4 text-center">
                <h5>Enlaces Rápidos</h5>
                <ul class="list-unstyled">
                    <li><a href="#home-section">Home</a></li>
                    <li><a href="#sealed-phones-section">Celulares Sellados</a></li>
                    <li><a href="#semi-new-phones-section">Celulares Semi Nuevos</a></li>
                </ul>
            </div>

            <div class="col-md-4 mb-4 text-center text-md-start">
                <h5>Contacto y Redes</h5>
                <p>¡Contáctanos para consultas o compras!</p>
                <div class="d-flex justify-content-center justify-content-md-start">
                    <a href="https://wa.me/59899884367" target="_blank" class="text-white me-3 social-icon-hover" aria-label="Contactar por WhatsApp">
                        <i class="fab fa-whatsapp fa-2x"></i>
                    </a>
                    <a href="#" class="text-white me-3 social-icon-hover" aria-label="Visitar nuestro Instagram">
                        <i class="fab fa-instagram fa-2x"></i>
                    </a>
                    <a href="#" class="text-white social-icon-hover" aria-label="Visitar nuestro Facebook">
                        <i class="fab fa-facebook-f fa-2x"></i>
                    </a>
                </div>
            </div>

        </div> <hr>

        <div class="row">
            <div class="col-12 text-center">
                <p class="mb-0">&copy; 2025 KarTech. Todos los derechos reservados.</p>
            </div>
        </div>

    </div> </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>

    <script>
      document.addEventListener("DOMContentLoaded", () => {
        // --- LÓGICA GENERAL DE LA PÁGINA ---
        const navbar = document.getElementById("navbar");
        if (navbar) {
          window.addEventListener("scroll", () => navbar.classList.toggle("scrolled", window.scrollY > 50));
        }

        const topBtn = document.getElementById("topBtn");
        if (topBtn) {
            window.addEventListener("scroll", () => topBtn.classList.toggle('visible', window.scrollY > 300));
            topBtn.addEventListener("click", () => window.scrollTo({ top: 0, behavior: "smooth" }));
        }
        
        const welcomeTexts = document.querySelectorAll(".welcome-text");
        welcomeTexts.forEach((text, index) => {
            setTimeout(() => text.classList.add("visible"), 500 + index * 400);
        });

        const cards = document.querySelectorAll(".card");
        const observer = new IntersectionObserver((entries, obs) => {
          entries.forEach(entry => {
            if (entry.isIntersecting) {
              entry.target.classList.add("visible");
              obs.unobserve(entry.target);
            }
          });
        }, { threshold: 0.1 });
        cards.forEach(card => observer.observe(card));

        const splideOptions = { perPage: 3, perMove: 1, gap: '1rem', pagination: false, breakpoints: { 1200: { perPage: 3 }, 992: { perPage: 2 }, 768: { perPage: 1 }}};
        // CAMBIO: Inicialización de todos los carruseles, incluido el nuevo de accesorios
        if (document.getElementById('sealed-carousel')) new Splide('#sealed-carousel', splideOptions).mount();
        if (document.getElementById('seminew-carousel')) new Splide('#seminew-carousel', splideOptions).mount();

        // --- LÓGICA DEL MODAL DE PRODUCTOS ---
        const productInfoModal = document.getElementById('productInfoModal');
        if (productInfoModal) {
            document.querySelectorAll('.card-img-top, .card-title').forEach(el => {
                el.addEventListener('click', (e) => {
                    const card = e.target.closest('.card');
                    if (!card) return;

                    const name = card.dataset.productName;
                    const images = JSON.parse(card.dataset.productImages);
                    const details = card.dataset.productDetails;
                    const price = parseFloat(card.dataset.productPrice).toLocaleString('es-UY');
                    const currency = card.dataset.productCurrency;
                    const actionType = card.dataset.actionType;

                    productInfoModal.querySelector('.modal-title').textContent = name;
                    productInfoModal.querySelector('#modal-product-price').textContent = `$${price} ${currency}`;
                    productInfoModal.querySelector('#modal-product-details').innerHTML = `<ul class="list-unstyled text-center mb-0">${details}</ul>`;

                    const carouselInner = productInfoModal.querySelector('#modal-carousel-images');
                    carouselInner.innerHTML = '';
                    images.forEach((image, index) => {
                        const item = document.createElement('div');
                        item.className = `carousel-item ${index === 0 ? 'active' : ''}`;
                        item.innerHTML = `<img src="${image}" class="d-block w-100" alt="${name}">`;
                        carouselInner.appendChild(item);
                    });

                    const modalFooter = productInfoModal.querySelector('.modal-footer');
                    modalFooter.innerHTML = ''; 

                    let purchaseButtonHTML = '';
                    if (actionType === 'paypal') {
                        purchaseButtonHTML = `<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank" class="d-grid">
                            <input type="hidden" name="cmd" value="_xclick">
                            <input type="hidden" name="business" value="juansee248@gmail.com">
                            <input type="hidden" name="item_name" value="${name}">
                            <input type="hidden" name="amount" value="${card.dataset.productPrice}">
                            <input type="hidden" name="currency_code" value="${currency}">
                            <button type="submit" class="btn btn-primary"><i class="fab fa-paypal me-2"></i>Comprar con PayPal</button>
                        </form>`;
                    } else if (actionType === 'whatsapp') {
                        purchaseButtonHTML = `<a href="https://wa.me/59899884367?text=Hola,%20me%20interesa%20comprar%20el%20${encodeURIComponent(name)}." target="_blank" class="btn btn-success">
                            <i class="fab fa-whatsapp me-2"></i>Comprar por WhatsApp
                        </a>`;
                    }
                    
                    const inquiryButtonHTML = `<a href="https://wa.me/59899884367?text=Hola,%20tengo%20una%20consulta%20sobre%20el%20${encodeURIComponent(name)}" target="_blank" class="btn btn-outline-success"><i class="fab fa-whatsapp me-1"></i> Hacer una consulta</a>`;
                    
                    modalFooter.innerHTML = purchaseButtonHTML + inquiryButtonHTML;
                    
                    const modal = new bootstrap.Modal(productInfoModal);
                    modal.show();
                });
            });
        }
        
        // --- LÓGICA DEL CARRITO DE COMPRAS ---
        let cart = JSON.parse(localStorage.getItem('shoppingCart')) || [];
        
        const cartContainer = document.getElementById('cart-items-container');
        const cartCountBadge = document.getElementById('cart-count');
        const emptyCartMessage = document.getElementById('empty-cart-message');
        const cartTotalContainer = document.getElementById('cart-total-container');
        const clearCartBtn = document.getElementById('clear-cart-btn');
        const checkoutBtn = document.getElementById('checkout-btn'); // CAMBIO: Botón de finalizar compra

        const saveCart = () => localStorage.setItem('shoppingCart', JSON.stringify(cart));

        const renderCart = () => {
            cartContainer.innerHTML = ''; 
            if (cart.length === 0) {
                cartContainer.appendChild(emptyCartMessage);
                emptyCartMessage.style.display = 'block';
                checkoutBtn.disabled = true; // CAMBIO: Deshabilitar botón si el carrito está vacío
            } else {
                emptyCartMessage.style.display = 'none';
                checkoutBtn.disabled = false; // CAMBIO: Habilitar botón si hay items
                cart.forEach(item => {
                    const itemHTML = `
                        <div class="cart-item" data-id="${item.id}">
                            <img src="${item.img}" alt="${item.name}">
                            <div class="cart-item-details">
                                <div class="name">${item.name}</div>
                                <div class="price">${item.quantity} x $${parseFloat(item.price).toLocaleString('es-UY')} ${item.currency}</div>
                            </div>
                            <button class="btn-remove-item" title="Eliminar">&times;</button>
                        </div>`;
                    cartContainer.innerHTML += itemHTML;
                });
            }
            updateCartCount();
            updateCartTotal();
            saveCart();
        };

        const updateCartCount = () => {
            const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
            cartCountBadge.textContent = totalItems;
        };
        
        const updateCartTotal = () => {
            const totals = cart.reduce((acc, item) => {
                if (!acc[item.currency]) acc[item.currency] = 0;
                acc[item.currency] += item.price * item.quantity;
                return acc;
            }, {});

            cartTotalContainer.innerHTML = '';
            if (Object.keys(totals).length === 0) {
                cartTotalContainer.innerHTML = 'Total: $0';
            } else {
                for (const currency in totals) {
                    cartTotalContainer.innerHTML += `<div>Total (${currency}): $${totals[currency].toLocaleString('es-UY')}</div>`;
                }
            }
        };

        const addToCart = (product) => {
            const existingItem = cart.find(item => item.id === product.id);
            if (existingItem) {
                existingItem.quantity++;
            } else {
                cart.push({ ...product, quantity: 1 });
            }
            renderCart();
        };

        const removeFromCart = (productId) => {
            const itemIndex = cart.findIndex(item => item.id === productId);
            if (itemIndex > -1) {
                if (cart[itemIndex].quantity > 1) {
                    cart[itemIndex].quantity--;
                } else {
                    cart.splice(itemIndex, 1);
                }
            }
            renderCart();
        };

        document.querySelector('main').addEventListener('click', e => {
            if (e.target.classList.contains('add-to-cart-btn')) {
                const card = e.target.closest('.card');
                const product = {
                    id: card.dataset.productId,
                    name: card.dataset.productName,
                    price: parseFloat(card.dataset.productPrice),
                    currency: card.dataset.productCurrency,
                    img: card.dataset.productImg
                };
                addToCart(product);
                const cartButton = document.querySelector('button[data-bs-target="#shoppingCart"]');
                cartButton.classList.add('btn-success');
                setTimeout(() => cartButton.classList.remove('btn-success'), 1000);
            }
        });

        cartContainer.addEventListener('click', e => {
            if (e.target.classList.contains('btn-remove-item')) {
                const cartItemDiv = e.target.closest('.cart-item');
                removeFromCart(cartItemDiv.dataset.id);
            }
        });

        clearCartBtn.addEventListener('click', () => {
            cart = [];
            renderCart();
        });

        // CAMBIO: Nueva lógica para el botón "Finalizar Compra"
        checkoutBtn.addEventListener('click', () => {
            if (cart.length === 0) return;

            const totals = cart.reduce((acc, item) => {
                if (!acc[item.currency]) acc[item.currency] = 0;
                acc[item.currency] += item.price * item.quantity;
                return acc;
            }, {});
            
            let message = "¡Hola TatoPhones! 👋 Me gustaría finalizar mi compra con los siguientes artículos:\n\n";
            
            cart.forEach(item => {
                message += `*• ${item.name}* (x${item.quantity}) - $${(item.price * item.quantity).toLocaleString('es-UY')} ${item.currency}\n`;
            });

            message += "\n";

            if (Object.keys(totals).length > 0) {
              message += "*Total a pagar:*\n";
              for (const currency in totals) {
                  message += `*- Total (${currency}):* $${totals[currency].toLocaleString('es-UY')}\n`;
              }
            }
            
            message += "\n¡Quedo a la espera de las instrucciones para el pago!";
            
            const whatsappUrl = `https://wa.me/59899884367?text=${encodeURIComponent(message)}`;
            window.open(whatsappUrl, '_blank');
        });

        renderCart();
      });
    </script>
</body>
</html>