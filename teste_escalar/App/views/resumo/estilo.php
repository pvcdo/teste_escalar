<style type="text/css">

  #grafico{
    align-items: flex-end;
    justify-content: space-around;
    display: flex;
  }

  #tempo, #valor{
    justify-content: space-around;
    display: flex;
    margin-bottom: 10px;
  }

  #grafico #divisao{
    width: 1px;
    height: 300px;
    background-color: black;
  }

  #tempo div{
    margin-top: 10px;
    align-content: center;
    display: flex;
  }

  #grafico #primeiro{
    height: 250px;
  }

  #grafico div{
    width: 50px;
    height: <?= $mensalidade/$ii * 250 ?>px;
    background-color: blue;
  }

  

</style>