     <button class="button" id="abrir-coisa">Add Upload</button>
    <div id="fade" class="hide"></div>
    <div id="modal1" class="hide">
      <div class="modal-header">
        <h2>Formulário de Upload</h2>
      
       
      </div>
      <div class="modal-body">
        <form method="POST" action="../arquivos/cadastro_arquivo.php" enctype="multipart/form-data">
           
            <div class="file">
            
            <input class="nome" type="text" name="nome" id="nome" placeholder="Digite o nome do arquivo" ><br>
       
            </div>
            <div class="file">
           <input type="file" id="file" name="imagem">             
            <label class="arquivo" for="file">
              <span class="text">Selecionar Arquivo</span>
            </label>
            </div>
            <div class="btns">
            <input name="btn" class="btna" type="submit" value="Cadastrar">
            
            <button type="button" id="fechar-coisa" class="close-form">Fechar</button>
            </div>
        </form>
      </div>
    </div>