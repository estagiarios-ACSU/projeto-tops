    
<section>
    <div class="search" style="display:flex;margin-top:20px;">
    <div style='width:50%'>
    <button class="btn-add">Adicionar</button>
    </div>
        <div class='pesquisa-container'>
            <select style="height:30px;" class="columns-infor-choice" name="columns-infor-choice">
                <option class='table-option-choice' value="Instituções">Instituções</option>
                <option class='table-option-choice' value="Localidade">Localidade</option>
                <option class='table-option-choice' value="Natureza">Natureza</option>
                <option class='table-option-choice' value="Zona">Zona</option>
                <option class='table-option-choice' value="Endereço">Endereço</option>
            </select>
            <div class="search-container" >
            <ion-icon class='search-icon' name="search-circle-outline"></ion-icon>
            <input class="search-input" type="text" placeholder="Pesquisar...">
            </div>
        </div>
        
    </div>

    <table>
        <thead>
            <tr>
                <th class='first-th'>Instituções</th>
                <th>Localidade</th>
                <th>Natureza</th>
                <th>Zona</th>
                <th>Endereço</th>
                <th style='display:none'>ID Referência</th>
                <th class='last-th'>Editar</th>

            </tr>
        </thead>
        <tbody class="tableBody">
            <!-- Os dados da tabela serão carregados aqui -->
        </tbody>
    </table>

    <div class="modal add-modal">
        <div class="modal-content">
        <span class="close-button">&times;</span>
                <div class="login-form">
                    <h2 style="font-size:22pt">Preencha as Informações</h2>
                        <form class="myForm add-form">
                            <div class="input-field">
                                <input type="text" name="instituicao" class="perfilInput" placeholder="Digite o Nome da Instituição" >
                            </div>
                            <div class="input-field">
                                <input type="text" name="localidade" class="perfilInput" placeholder="Digite a Localidade">
                            </div>
                            <div class="input-field">
                                <input type="text" name="natureza" class="perfilInput" placeholder="Digite a Natureza">
                            </div>
                            <div class="input-field">
                                <input type="text" name="zona" class="perfilInput" placeholder="Digite a Zona">
                            </div>
                            <div class="input-field">
                                <input type="text" name="endereco" class="perfilInput" placeholder="Digite o Endereço">
                            </div>
                            <div>
                                <input name="btn" class="bottom-button saveBtn" type="submit" value="Adicionar" id="saveBtn">
                                <button class="bottom-button closeBtn" id="closeModalBtn">Cancelar</button>
                            </div>
                        </form>
                </div>
        </div>
    </div>

    <div class="modal edit-modal">
        <div class="modal-content">
        <span class="close-button">&times;</span>
                <div class="login-form">
                    <h2 style="font-size:22pt">Preencha as Informações</h2>
                        <form class="myForm edit-form">
                            <div class="input-field">
                                <input type="text" name="instituicao" class="perfil-InputEdit" placeholder="Digite o Nome da Instituição">
                            </div>
                            <div class="input-field">
                                <input type="text" name="localidade" class="perfil-InputEdit" placeholder="Digite a Localidade">
                            </div>
                            <div class="input-field">
                                <input type="text" name="natureza" class="perfil-InputEdit" placeholder="Digite a Natureza">
                            </div>
                            <div class="input-field">
                                <input type="text" name="zona" class="perfil-InputEdit" placeholder="Digite a Zona">
                            </div>
                            <div class="input-field">
                                <input type="text" name="endereco" class="perfil-InputEdit" placeholder="Digite o Endereço">
                            </div>
                            <div style="display:none;" class="input-field">
                                <input type="text" name="id_referencia" class="perfil-InputEdit" placeholder="Digite o Endereço">
                            </div>
                            <div>
                                <input name="btn" class="bottom-button saveBtn-edit" type="submit" value="Editar">
                                <button class="bottom-button closeBtn-Edit">Cancelar</button>
                            </div>
                        </form>
                </div>
        </div>
    </div>
</section>

 