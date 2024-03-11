<header>

    <input onclick="startAnimated()" type="checkbox" id="menu-toggle" tabindex="0">
    <label for="menu-toggle" class="menu-hamburger">&#9776;</label>


    <nav class="menu">
        <div class="logo">Thamires Guimarães</div>
        <ul class="links">
          
          <li>
                <a href="#">Inicio</a>
            </li>
            <li>
                <button class="whatsapp-button">
                    <span class="whatsapp-icon"></span>
                    <a class="whatsapp-text">Whatsapp</a>
                </button>
            </li>
        </ul>
        <div class="social-icon"> 
            <!-- Social Medias -->
        
                <a href="https://www.instagram.com/seu_usuario_instagram" >
                    <img width="25" height="25" src="/assets/img/instagram-icon.png" alt="Instagram">
                </a>
                <a href="https://www.facebook.com/seu_usuario_facebook" >
                    <img width="25" height="25" src="/assets/img/facebook-icon.png" alt="Facebook">
                </a>
            </div>
    </nav>
</header>

<section class="slideshow-container">

    <div class="mySlides fade">

        <img src="/assets/img/teste2.webp" alt="unhas sendo feita" width="100%" height="250px">

    </div>

    <div class="mySlides fade">
        <img src="/assets/img/teste.webp" alt="agenda" width="100%" height="250px">
    </div>

    <div class="mySlides fade">
        <img src="/assets/img/iate.jpg" alt="iate clube muriqui" width="100%" height="250px">
    </div>

    <!-- Navegação para slides anteriores/próximos -->
    <div class="controlers">
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>
</section>