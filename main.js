
const a_click = document.querySelector('.a_click');

a_click.addEventListener('click', (event)=>{
    swal({
      title: "Terminos y condiciones",
      text: "Polla Mundialista VENTINE   1. Ingresa tus datos personales 2. Ingresa el número de factura de tu última compra 3. Coloca los resultados de los partidos del mundial de fútbol Qatar 2022  4. Primer puesto: Campeón, subcampeón, tercero y cuarto puesto ganas un cupón de $300.000. Segundo puesto: Campeón y subcampeón ganas un cupón de $150.000. Tercer puesto: Campeón ganas un cupón de $100.000. *Si hay empate, ganará la persona qué tenga el mayor número de aciertos de los partidos del mundial de fútbol Qatar 2022. *Los cupones son virtuales, se canjean en la página web www.VENTINE.com.co",
      icon: "success",
      button: "Entendido",
    });

});
