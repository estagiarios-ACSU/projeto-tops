    
<section>
    <div class="search" style="display:flex;margin-top:20px;">
        <button id="btn-add">Adicionar Linha</button>
        <div style="margin-left:30%;margin-top: 1.5rem">
            <input style="height:30px;" list="columns-infor" id="columns-infor-choice" name="columns-infor-choice" />

            <datalist id="columns-infor">
            <option value="Instituções"></option>
            <option value="Localidade"></option>
            <option value="Natureza"></option>
            <option value="Zona"></option>
            <option value="Endereço"></option>
            </datalist>

            <input style="height:30px;" class="search" type="text" id="searchInput" placeholder="Pesquisar...">
        </div>
        
    </div>

    <table>
        <thead>
            <tr>
                <th>Instituções</th>
                <th>Localidade</th>
                <th>Natureza</th>
                <th>Zona</th>
                <th>Endereço</th>
                <th>ID Referência</th>
                <th>Editar</th>

            </tr>
        </thead>
        <tbody id="tableBody">
            <!-- Os dados da tabela serão carregados aqui -->
        </tbody>
    </table>

    <div class="modal add-modal">
        <div class="modal-content">
        <span class="close-button">&times;</span>
                <div class="login-form">
                    <h2 style="font-size:22pt">Preencha as Informações</h2>
                        <form class="myForm">
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
                                <button class="bottom-button closeBtn" id="closeModalBtn">Cancelar</button>
                                <input name="btn" class="bottom-button saveBtn" type="submit" value="Adicionar" id="saveBtn">
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
                        <form class="myForm">
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
                            <div style="display:none;" class="input-field">
                                <input type="text" name="id_referencia" class="perfilInput" placeholder="Digite o Endereço">
                            </div>
                            <div>
                                <button class="bottom-button closeBtn-Edit">Cancelar</button>
                                <input name="btn" class="bottom-button saveBtn-edit" type="submit" value="Adicionar">
                            </div>
                        </form>
                </div>
        </div>
    </div>
</section>

 