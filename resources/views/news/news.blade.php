<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <header class="header">
        <nav class="nav">
            <img src="{{ asset('img/bienestar/logomentius.png') }}" alt="Logo Mentius"><a
                href="{{ route('noticias.show', 0) }}" class="btn btn-success">Gestor de tiempos</a>

            <!-- <form class="searchForm">
        <input type="search" class="search" value="Buscar">
      </form> -->
        </nav>
        <div class="infoBienestar">
            <img src="{{ asset('img/bienestar/Logobienestarteinforma.png') }}">

            <div class="item-info-bienestar">
                <p>
                    Lorem impsum dolor sit amet, consectetuer adipiscing
                    elit, sed diam nonumy nibh euismod.
                </p>
                <button class="item-info-button">
                    Más información
                </button>
            </div>
        </div>
    </header>
    <main>
        <div class="container-fluid">
            <div class="container">
                <div class="carouselGeneral">
                      <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @foreach ($noticias as $noticia)
                                <div class="carousel-item active" data-bs-interval="1500">
                                    <img src="{{ asset('storage') . '/' . $noticia->file_new }}"
                                    class="imagenCarrousel">
                                    <div class="textoCambio">
                                        <h5>{{ $noticia->title }}</h5>
                                        <p>{{ $noticia->description }}</p>
                                    </div>
                                    
                                </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Next</span>
                        </button>
                      </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="container">
                <h2 class="tituloGeneral">NUESTROS CONVENIOS</h2>
                <div class="convenios">
                    <div class="items-convenios">
                        <div class="item-convenio styleOff" id="vivienda-item" onclick="viviendas()">
                            <img src="{{ asset('img/bienestar/Logoviviendapropia.png') }}">
                            Vivienda Propia
                        </div>
                        <div class="item-convenio styleOff" id="caja-item" onclick="cajas()"><img
                                src="{{ asset('img/bienestar/logocajadecompensación.png') }}">Caja de compensación</div>
                        <div class="item-convenio styleOff" id="educativos-item" onclick="educativos()"><img
                                src="{{ asset('img/bienestar/logoeducativo.png') }}">Educativos
                        </div>
                        <div class="item-convenio styleOff" id="credito-item" onclick="creditos()"><img
                                src="{{ asset('img/bienestar/logocreditos.png') }}">Créditos
                        </div>
                        <div class="item-convenio styleOff" id="otros-item" onclick="otross()"><img
                                src="{{ asset('img/bienestar/logootros.png') }}">Otros</div>
                    </div>
                    <div class="img-convenios">
                        <img src="{{ asset('img/bienestar/Imagenmano.png') }}" id="img-convenios">
                        <div class="item-convenios vivienda">
                            @foreach ($viviendas as $vivienda)
                                <h3>{{ $vivienda->title }}</h3>
                                <p class="text-convenio">{{ $vivienda->convenio }}</p>
                            @endforeach
                        </div>
                        <div class="item-convenios caja">
                            @foreach ($cajas as $caja)
                                <h3>{{ $caja->title }}</h3>
                                <p class="text-convenio">{{ $caja->convenio }}</p>
                            @endforeach
                        </div>
                        <div class="item-convenios educativo">
                            @foreach ($educativos as $educativo)
                                <h3>{{ $educativo->title }}</h3>
                                <p class="text-convenio">{{ $educativo->convenio }}</p>
                            @endforeach

                        </div>
                        <div class="item-convenios credito">
                            @foreach ($creditos as $credito)
                                <h3>{{ $credito->title }}</h3>
                                <p class="text-convenio">{{ $credito->convenio }}</p>
                            @endforeach
                        </div>
                        <div class="item-convenios otros">
                            @foreach ($otros as $otro)
                                <h3>{{ $otro->title }}</h3>
                                <p class="text-convenio">{{ $otro->convenio }}</p>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="footer">
        <div class="footer-text">
            <h3>
                Lorem Ipsum is simply dummy
                text of the printing and typesetting industry. Lo
            </h3>
            <p>
                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                Lo
            </p>
        </div>

        <img src="{{ asset('img/bienestar/imagen3.png') }}">
    </footer>

</body>
<style>
    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }

    @font-face {
        font-family: Lemon;
        src: url(./LemonYellowSun.otf);
    }

    body {
        overflow-x: hidden;
    }

    h2 {
        color: #fff;
        font-size: 7rem;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .tituloGeneral {
        font-family: 'Lemon';
    }

    .header {
        width: 100%;
        height: 100vh;
        padding: 5rem;
        display: flex;
        align-items: center;
        background: url(./img/bienestar/FONDO1INICIO_1.png);
    }

    .nav {
        position: absolute;
        top: 0%;
        width: -webkit-fill-available;
        height: 25vh;
        padding: 0rem;
        display: flex;
        align-items: center;
        justify-content: space-around;
    }

    .nav img {
        max-width: 25%;
    }

    .searchForm {
        width: 18%;
    }

    .search {
        width: 100%;
        padding: 1.2rem;
        border-radius: 10px;
        color: #fff;
        border: 0.5px solid #fff;
        background: transparent;
    }

    .item-info-bienestar {
        max-width: 40vw;
        display: flex;
        flex-direction: column;
        flex-wrap: wrap;
        justify-content: center;
        align-items: flex-start;
        color: #fff;
    }

    .item-info-bienestar p {
        font-size: 2rem;
        padding: 2rem 0rem;
    }

    .infoBienestar img {
        max-width: 55%;
    }

    .item-info-button {
        padding: 1.2rem;
        border-radius: 40px;
        font-size: 1.2rem;
        font-weight: bolder;
        letter-spacing: 2px;
        border: none;
        cursor: pointer;
        transition: all .5s ease-in-out;
    }

    .item-info-button:hover {
        transform: translate(10px, -10px);
        filter: drop-shadow(2px 4px 6px rgb(0, 0, 0));
    }

    /*
main
*/
    main {
        width: 100%;
        height: auto;
        background: url(./img/bienestar/fondo2.png);
        background-size: cover;
    }

    .container {
        height: 100%;
    }

    .carouselGeneral {
        max-height: 50vh;
        padding: 3rem 0rem;
    }

    .carousel-item img {
        height: 70vh;
    }

    /*
Convenios
*/

    .convenios {
        display: flex;
        justify-content: space-around;
        align-items: center;
        padding: 5rem 0rem;
    }

    .img-convenios img {
        width: 90%;
    }

    .items-convenios {
        width: 100%;
        height: 100%;
    }

    .item-convenio {
        display: flex;
        justify-content: flex-start;
        align-items: center;
        padding: 1rem;
        border: 1px solid gray;
        background: #fff;
        margin: 0.2rem 0rem;
        min-width: fit-content;
        max-width: 50%;
        border-radius: 14px;
        filter: drop-shadow(2px 4px 6px gray);
        font-size: larger;
        font-weight: bolder;
        letter-spacing: 2px;
        cursor: pointer;
        transition: all 0.5s ease-in-out;
    }

    .item-convenio:hover {
        font-size: 2rem;
        filter: drop-shadow(3px 5px 7px black);
    }

    .item-convenio img {
        width: 95px;
        height: 95px;
        transition: all 0.5s ease-in;
    }

    .item-convenio:hover img {
        width: 125px;
        height: 125px;
    }
    .item-convenios{
        display: none;
        flex-direction: column;
        flex-wrap: wrap;
        min-width: 28vw;
    }
    .item-convenios h3{
        font-size: 3.5rem;
    }
    .text-convenio{
        font-size: 2rem
    }
    /*
segunda galeria
*/
    section {
        display: flex;
        width: -webkit-fill-available;
        height: 100vh;
        padding: 2rem;
    }

    section img {
        width: 0px;
        flex-grow: 1;
        object-fit: cover;
        opacity: .8;
        transition: all 0.5s ease;
    }

    section img:hover {
        cursor: crosshair;
        width: 40vw;
        opacity: 1;
    }

    /*
footer
*/

    .footer {
        display: flex;
        justify-content: space-evenly;
        align-items: center;
        background: url(./img/bienestar/fondo3.png);
        background-size: cover;
        height: 100vh;
    }

    .footer-text {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        width: 52%;
        position: relative;
        top: -11%;
        left: 7%;
    }

    .footer-text h3 {
        width: 90%;
        font-size: 3rem;
        padding: 1rem;
    }

    .footer-text p {
        font-size: 2rem;
        padding: 1rem;
        width: 84%;
    }

    .imagenCarrousel {
        width: 100%;
    }

    .convenioStart {
        display: flex !important;
    }

    .textoCambio{
                    font-size: 2.25rem;
                    position: absolute;
                    display: flex;
                    flex-flow: column;
                    justify-items: center;
                    top: 75%;
                    background: #ffffff57;
                    padding: 2rem;
                    min-width: 100%;
                    text-align: center;
                    cursor: pointer;
                    font-weight: bolder
                    transition: all 0.5s ease-out;
                }
                .textoCambio:hover{
                    background: #fff;
                }
</style>
<script>
    const imgConvenios = document.querySelector('#img-convenios');
    const itemsConvenios = document.querySelectorAll('.item-convenios');
    const viviendaItem = document.querySelector('#vivienda-item');
    const imgConvenio = document.querySelector('#img-convenios');
    const vivienda = document.querySelector('.vivienda');
    const educativo = document.querySelector('.educativo');
    const credito = document.querySelector('.credito');
    const caja = document.querySelector('.caja');
    const otros = document.querySelector('.otros');
    const educativosItem = document.querySelector('#educativos-item');
    const creditoItem = document.querySelector('#credito-item');
    const otrosItem = document.querySelector('#otros-item');
    const cajaItem = document.querySelector('#caja-item');
    const styleOff = document.querySelectorAll('.styleOff');
    const myCarouselElement = document.querySelector('#myCarousel')

    const carousel = new bootstrap.Carousel(myCarouselElement, {
    interval: 2000,
    touch: true
    })
    function clear(cambio){
        gsap.to(imgConvenios, {
            display: "none",
            ease: "power2.out"
        });
        itemsConvenios.forEach(element => {
            gsap.to(element, {
                display: "none",
                ease: "power2.out"
            });
        });
       
        styleOff.forEach(element2 => {
            if(element2 === cambio){
                gsap.fromTo(element2,0.7,{background:"#fff"},{background:"#2B4562", color:"#fff"});
            }else{
                gsap.fromTo(element2,{x:"-200%"},{x:"0%", background:"#fff", color:"#2B4562"});
            } 
        });   
    }
    function viviendas(e) {
        let cambio = viviendaItem;
        clear(cambio);

        gsap.fromTo(vivienda,  {
            display: "flex",
            x:"-200%",
            ease: "power2.out"
        },{display: "flex",x: "0%",
            ease: "power2.out"});
    }

    function educativos(e) {
        let cambio = educativosItem;
        clear(cambio);

        gsap.fromTo(educativo, {
            display: "flex",
            x:"-200%",
            ease: "power2.out"
        },{display: "flex",x: "0%",
            ease: "power2.out"});
    }
    function creditos(e) {
        let cambio = creditoItem;
        clear(cambio);

        gsap.fromTo(credito, {
            display: "flex",
            x:"-200%",
            ease: "power2.out"
        },{display: "flex",x: "0%",
            ease: "power2.out"});
    }
    

    function cajas(e) {
        let cambio = cajaItem;
        clear(cambio);

        gsap.fromTo(caja, {
            display: "flex",
            x:"-200%",
            ease: "power2.out"
        },{display: "flex",x: "0%",
            ease: "power2.out"});
    }
    
    function otross(e) {
        let cambio = otrosItem;
        clear(cambio);
        gsap.fromTo(otros,  {
            display: "flex",
            x:"-200%",
            ease: "power2.out"
        },{display: "flex",x: "0%",
            ease: "power2.out"});
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"
    integrity="sha512-f8mwTB+Bs8a5c46DEm7HQLcJuHMBaH/UFlcgyetMqqkvTcYg4g5VXsYR71b3qC82lZytjNYvBj2pf0VekA9/FQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</html>
