        <form action="../arquivos/upload.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="file" />
            <button class="btna" type="submit">Enviar</button>
        </form>
    
    <style>
     
.btna {
    width: 7rem;
    font-size: 1rem;
    font-weight: 600;
    color: #fff;
    cursor: pointer;
    margin-top: 1rem;
    height: 3rem;
    text-align:center;
    border: none;
    background-size: 300% 100%;
    border-radius: 3rem;
    moz-transition: all .4s ease-in-out;
    -o-transition: all .4s ease-in-out;
    -webkit-transition: all .4s ease-in-out;
    transition: all .4s ease-in-out;
    font-weight: 300;
  }

.btna:hover {
    background-position: 100% 0;
    moz-transition: all .4s ease-in-out;
    -o-transition: all .4s ease-in-out;
    -webkit-transition: all .4s ease-in-out;
    transition: all .4s ease-in-out;
  }
  
.btna:focus {
    outline: none;
  }
  
  .btna {
    background-image: linear-gradient(
      to right,
      #2874fc,
      #5496ec,
      #1b61e2,
      #502bb6
    );
    box-shadow: 0 4px 15px 0 rgba(49, 196, 190, 0.75);
  }

    </style>