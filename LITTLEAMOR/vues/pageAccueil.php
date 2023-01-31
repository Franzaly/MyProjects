
<div class="centre">


    <!--le rajout des carouselle -->
    <!--The class="carousel" specifies that this <div> contains a carousel.
        -The .slide class adds a CSS transition and animation effect, which makes the items slide when showing a new item. 
        Omit this class if you do not want this effect
        -The data-ride="carousel" attribute tells Bootstrap to begin animating the carousel immediately when the page loads. -->
  <div id="myCarousel" class="carousel slide" data-ride="carousel">

        <!-- Indicators :-->
        <!--The indicators are the little dots at the bottom of each slide (which indicates how many slides there are in the carousel, 
        and which slide the user is currently viewing).-->
        <ol class="carousel-indicators">
            <!--The data-target attribute points to the id of the carousel.-->
            <!--The data-slide-to attribute specifies which slide to go to, when clicking on the specific dot.-->
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
      
        <!-- Wrapper for slides -->
        <div class="carousel-inner ">
          <!--The .active class needs to be added to one of the slides. 
            Otherwise, the carousel will not be visible.-->
            <!--sans le courousel-item les images sont une en dessous de lautre-->
          <div class="carousel-item active">
            <img src="../LITTLEAMOR/images/happybaby1.jpeg" alt="happybaby"  width="100%">
          </div>
      
          <div class="carousel-item">
            <img src="../LITTLEAMOR/images/Toddler-class.jpg" alt="todlerclas" width="100%">
          </div>
      
          <div class="carousel-item">
            <img src="../LITTLEAMOR/images/childrenplaying.jpg" alt="childrenplaying"  width="100%">
          </div>
        </div>
      
        <!-- Left and right controls -->
        <!--This code adds "left" and "right" buttons that allows the user to go back and forth between the slides manually.
          The data-slide attribute accepts the keywords "prev" or "next", which alters the slide position relative to its current position.-->
          <!--la premiere ligne permet davoir le next previous dans la photo directemnent-->
        <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>

      

      <div class="zone_centre">

        <h2>Les produits</h2>

        <?php
        // ==================== Utilisation des fonctions d'affichage ===================== 

        include "inclusions/functions.inc.php";
        afficherListProduits($controleur->getTabProduits());

        ?>



      </div>

</div>
