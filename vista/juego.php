<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport"
      content="width=device-width,
       initial-scale=1.0">
    <title>MoonSpeedGS</title>
    <link rel="icon" href="../img/nave1.png" type="image/png">
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
   
  </head>
  <body>
  	<!--<section class="features_area" id="features_counter"  >
		<div class="container" style="margin:50px auto">
          <div class="row counter_wrapper" style="background:transparent;border-radius:15px;border: 3px solid gold">
            <div class="col-md-12 col-md-offset-3" >
                <div class="panel panel-login">
                    <div class="panel-heading" style="padding:20px">
                        <div class="panel-body">
                            <div class="row justify-content-center">
                                <div class="col-lg-12">
                                    <form action="../ctrl/ctrlViajes.php" method="post" enctype="multipart/form-data" role="form"  >
                                        <div class="row justify-content-center" style="text-align:center">
                                            <div class="col-lg-4 col-md-3 col-sm-3" style="text-align: right">
                                                <img src="../img/nave2.png" />
                                            </div>
                                            <div class="col-lg-4 col-md-5 col-sm-5">
                                                <h1 style="color:gold;text-align: center;font-family: Showcard Gothic,sans-serif">Moon Speed</h1><br>
                                            </div>
                                            <div class="col-lg-4 col-md-3 col-sm-3" style="text-align: left">
                                                <img src="../img/nave2.png" />
                                            </div>
                                        </div>
                                        
                                        <p style="text-align: center; margin-bottom:0px;color: white;font-size: 20px">
                                            Bienvenidos a MoonSpeed
                                        </p><br>
                                        <p style="text-align: center; margin-bottom:0px;color: white;font-size: 20px">
                                            Instrucciones:
                                        </p><br>
                                        <p style="text-align: center; margin-bottom:0px;color: white;font-size: 20px">
                                            Flechas para moverte y para ganar puntaje es el destruir las naves enemigas
                                        </p><br><br>
                                        <p style="text-align: center; margin-bottom:0px;color: gold;font-size: 20px">
                                            Selecciona la nave preferida para empezar a jugar
                                        </p><br>
                                        <div class="row justify-content-center" style="text-align:center">
                                            <div class="col-lg-3 col-md-6 col-sm-6" style="text-align: center">
                                            </div>
                                            <div class="col-lg-3 col-md-6 col-sm-6" style="text-align: center">
                                                <img src="../img/naveP.png" height="100px !important" width="100px !important" style="border: 2px solid gold; border-radius: 15px; padding: 8px;margin-top: 15px"/>
                                            </div><br>
                                            <div class="col-lg-3 col-md-6 col-sm-6" style="text-align: center">
                                                <img src="../img/naveP2.png" height="100px !important" width="100px !important" style="border: 2px solid gold; border-radius: 15px; padding: 8px;margin-top: 15px"/>
                                            </div>
                                            <div class="col-lg-3 col-md-6 col-sm-6" style="text-align: center">
                                            </div>
                                        </div>
                                        
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
            </div>
        </div>
      </section>
			-->					
	
      <script>
        function aleatorio(
            menor, mayor) {
            return menor + Math.floor(
              Math.random() *
              (mayor - menor + 1));
          }
          
        /** @interface */
        class SeMueve {
          muévete() {
            throw new Error("intf");
          }
        }
          
        /** @implements {SeMueve} */
        class NavePrincipal
          extends HTMLElement {
          connectedCallback() {
            this.x = Math.floor(
                window.innerWidth/2);
            this.y = window.innerHeight /5;
            this.innerHTML = "<?php 
            if(isset($_POST['nave'])){
                
                echo "<img src='".$_REQUEST['nave']."' height='100px !important' width='100px !important'/>";
            }else{
                echo "<img src='../img/naveP.png' height='100px !important' width='100px !important'/>";
            }
              ?>";
            this.style.position =
              "fixed";
            this.style.fontSize =
              "2rem";
            this.style.right =
              `${this.x}px`;
            this.style.bottom =
              `${this.y}px`;
            
          }
          muévete() {
            this.x = (this.x + 30) %
              window.innerWidth;
            this.style.right =
              `${this.x}px`;
          }
          asciendeNave(){
             // window.alert(window.outerHeight);
            if(this.y < window.innerHeight /1.4){
                this.y = (this.y + 30) %
                window.innerHeight;
                this.style.bottom =
                `${this.y}px`;
            }
          }
          desciendeNave(){
             /* window.alert(window.innerHeight/4);
              window.alert(this.y);*/
            if(this.y>window.innerHeight /5){
                 this.y = (this.y - 30) %
                window.innerHeight;
                this.style.bottom =
                `${this.y}px`;
            }
           
          }
          retrocedeNave(){
             /* window.alert(window.innerHeight/4);*/
              //window.alert(this.x);
            //if(this.x< window.innerWidth/1.5){
                 this.x = (this.x - 100) %
                window.innerWidth;
                this.style.left =
                `${this.x}px`;
            //}
           
           }
           avanzaNave(){
             /* window.alert(window.innerHeight/4);
              window.alert(this.y);*/
            //if(this.x< window.innerWidth/1.5){
                 this.x = (this.x - 100) %
                window.innerWidth;
                this.style.right =
                `${this.x}px`;
            //}
           
          }
              
          }
        
        customElements.define(
          "nave-princi", NavePrincipal);
          
        /** @implements {SeMueve} */
        class NaveEnemigaYellow
          extends HTMLElement {
          connectedCallback() {
            this.x = aleatorio(0,
              Math.floor(
                window.innerWidth));
            this.y = 0;
            this.innerHTML = "<img src='../img/enemy.png' id='movNav' height='100px !important' width='150px !important' style='transform: rotate(180deg);'/>";
            this.style.position =
              "fixed";
            this.style.fontSize =
              "2rem";
            this.style.left =
              `${this.x}px`;
            this.style.top =
              `${this.y}px`;
          }
          muévete() {
             
            this.y = (this.y + 10) %
              window.innerHeight;
            this.style.top =
              `${this.y}px`;
          }
        }
        customElements.define(
          "nave-yellow", NaveEnemigaYellow);
          
        /** @implements {SeMueve} */
        class NaveEnemigaRed
          extends HTMLElement {
          connectedCallback() {
            this.x = aleatorio(0,
              Math.floor(
                window.innerWidth));
            this.y = 0;
            this.innerHTML = "<img src='../img/enemy2.png' id='movNav' height='100px !important' width='150px !important'/>";
            this.style.position =
              "fixed";
            this.style.fontSize =
              "2rem";
            this.style.left =
              `${this.x}px`;
            this.style.top =
              `${this.y}px`;
          }
          muévete() {
            this.y = (this.y + 10) %
              window.innerHeight;
            this.style.top =
              `${this.y}px`;
              
          }
        }
        customElements.define(
          "nave-red", NaveEnemigaRed);
      
       /*---------------------Controlador para la nave principal---------------------*/ 
       
      class ControladorNaveP
          
        extends HTMLElement {
        connectedCallback() {
          this.muévete = this.
            muévete.bind(this);
            this.retrocedeNave = this.
            retrocedeNave.bind(this);
            this.avanzaNave = this.
            avanzaNave.bind(this);
            this.asciendeNave = this.
            asciendeNave.bind(this);
            this.desciendeNave = this.
            desciendeNave.bind(this);
            this.actualizaAlcohon = this.
            actualizaAlcohon.bind(this);
            this.dibujaAlcohon = this.
            dibujaAlcohon.bind(this);
            
          this.innerHTML =
            /* html */
            `
            
              <button onclick="this.
                parentElement.asciendeNave();">
                ▲
              </button>
            
            
              <button onclick="this.
                parentElement.retrocedeNave();">
                ◀
              </button>
              <button onclick="this.
                parentElement.desciendeNave();">
                ▼
              </button>
              <button onclick="this.
                parentElement.avanzaNave();">
                ▶
              </button>
            `;
          this.naveP =
            new NavePrincipal();
          this.enemigas =
            [new NaveEnemigaRed(),
            new NaveEnemigaYellow(),
            new NaveEnemigaRed(),
            new NaveEnemigaYellow()];
          this.append(this.naveP);
          for (let nav of this.enemigas) {
            this.append(nav);
          }
            
            this.muévete();
        }
             muévete() {
              for (let nav of
                this.enemigas) {
                    nav.muévete();
                setInterval(
                nav.muévete(), 5);
              }
            }
            
        
          retrocedeNave() {
            this.naveP.retrocedeNave();
          }
          avanzaNave() {
            this.naveP.avanzaNave();
          }
           asciendeNave() {
           this.naveP.asciendeNave();
          }
           desciendeNave() {
            this.naveP.desciendeNave();
          }
          actualizaAlcohon() {
            yBaseN =
              window.innerHeight / 4;
            xMenor =
              window.innerWidth / 9;
            xMayor =
              4 * window.innerWidth / 5;
            yMenor =
              window.innerHeight / 4;
            yMayor =
              3 * window.innerHeight / 4;
          }
          dibujaAlcohon() {
            alcohonMilenario.style =
              `left: ${xN}px; bottom: ${yMenor}px;top:${yN}px; right: ${xMenor}px;`;
          }
        
      }
      customElements.define(
        "controlador-web",
        ControladorNaveP);
      </script>
      
      
    <output id="estrellaMuerte"
      class="sprite">
    	
    </output>
    <output id="alcohonMilenario"
      class="sprite">
        <!--<img src="<?php 
            if(isset($_POST['nave'])){
                
                echo $_REQUEST['nave'];
            }else{
                echo '../img/naveP2.png';
            }
              ?>" />-->
    </output>
    <footer style="text-align:center">
      <p id="pie">
        <controlador-web>
        </controlador-web><br><br>
        &copy; 2021
        Angel Isaac Garrido Sánchez.
        
      </p>
    </footer>
    <script>
        
        
        setInterval(
        avanza, 5);
      function avanza() {
        const xMáxima =
          window.innerWidth;
        const amplitud =
          window.innerHeight / 2;
        const yBase =
          window.innerHeight / 3;
        y = yBase +
          amplitud * Math.sin(50 * x);
        estrellaMuerte.style =
          `top: ${y}px;`;
        x =
          (x + VELOCIDAD) % xMáxima;
      }
        
        function asciendeAlcohon() {
            actualizaAlcohon();
            if (yN > yMenor) {
              yN -= VELOCIDADN;
            }
            dibujaAlcohon();
          }
    </script>
      
    <script>
      /*Funciones para que se mueva de forma ondulatoria la estrella de la muerte*/
      const REFRESCO = 5;
      const VELOCIDAD = 0.5;
      const FRECUENCIA = 0.03;
      let x = 0;
      function avanza() {
        const xMáxima =
          window.innerWidth;
        const amplitud =
          window.innerHeight / 5;
        const yBase =
          window.innerHeight / 3;
        y = yBase +
          amplitud * Math.sin(FRECUENCIA * x);
        estrellaMuerte.style =
          `left: ${x}px; bottom: ${y}px`;
        x =
          (x + VELOCIDAD) % xMáxima;
      }
      /*-----------------------------------------------*/
      /*Funciones para que se mueva el alcohon milenario*/
      
      const VELOCIDADN = 50;
      let yBaseN;
      let xMenor;
      let xMayor;
      let yMenor;
      let yMayor;
      
      let xN = xMenor;
      let yN = yMenor;
      
      pie.style=`margin-top:${3* window.innerHeight / 3.7}px;text-align: center; font-size:24px`;
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>