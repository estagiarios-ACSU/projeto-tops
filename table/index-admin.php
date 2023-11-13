    
<section>
    <div class="search" style="display:flex;margin-top:20px;">
    <div style='width:50%'>
    <button class="btn-add">Adicionar</button>
    </div>
        <div class='pesquisa-container'>
            <select style="height:30px;" class="columns-infor-choice" name="columns-infor-choice">
                <option class='table-option-choice' value="Usuário">Nome Usuário</option>
                <option class='table-option-choice' value="Email">Email</option>
                <option class='table-option-choice' value="Senha">Senha</option>
                <option class='table-option-choice' value="Tipo">Tipo</option>
                <option class='table-option-choice' value="Função">Função</option>
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
                <th class='first-th'>Nome Usuário</th>
                <th>Email</th>
                <th>Senha</th>
                <th>Tipo</th>
                <th >Função</th>
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
                                <input type="text" name="usuario" class="adminInput" placeholder="Digite o Nome do Usuário" >
                            </div>
                            <div class="input-field">
                                <input type="text" name="email" class="adminInput" placeholder="Digite o email">
                            </div>
                            <div class="input-field">
                                <input type="text" name="senha" class="adminInput" placeholder="Digite a senha">
                            </div>
                            <div class="input-field" style='margin-top:20px'>
                                <select style="height:30px;" class="columns-infor-choice adminInput selectAdmin" name="admin">
                                <option class='table-option-choice' value="Gerente">Gerente</option>
                                <option class='table-option-choice' value="Admin">Admin</option>
                                </select>
                            </div>
                            <div class="input-field" style="display:none">
                                <input type="text" name="funcao" class="adminInput" placeholder="Digite o Endereço">
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
                                <input type="text" name="usuario" class="admin-InputEdit" placeholder="Digite o Nome do Usuário">
                            </div>
                            <div class="input-field">
                                <input type="text" name="email" class="admin-InputEdit" placeholder="Digite a email">
                            </div>
                            <div class="input-field">
                                <input type="text" name="senha" class="admin-InputEdit" placeholder="Digite a senha">
                            </div>
                            <div class="input-field" style='margin-top:20px'>
                            <select style="height:30px;" class="columns-infor-choice admin-InputEdit selectAdmin " name="admin">
                                <option class='table-option-choice' value="Gerente">Gerente</option>
                                <option class='table-option-choice' value="Admin">Admin</option>
                                </select>
                            </div>

                            <div class="input-field" style="display:none;">
                                <input type="text" name="funcao" class="admin-InputEdit" placeholder="Digite a Função">
                            </div>
                            <div style="display:none;" class="input-field">
                                <input type="text" name="id_referencia" class="admin-InputEdit" placeholder="Digite o Endereço">
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

 