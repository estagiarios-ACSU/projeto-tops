    <div class="search" style="display:flex;margin-top:20px;">
        <button id="btn-add">Adicionar Linha</button>
        <input style="margin-left:50%;height:30px;margin-top:4%;" class="search" type="text" id="searchInput" placeholder="Pesquisar...">
    </div>

    <table>
        <thead>
            <tr>
                <th>Instituções</th>
                <th>Localidade</th>
                <th>Natureza</th>
                <th>Zona</th>
                <th>Endereço</th>
                <th>Editar</th>
            </tr>
        </thead>
        <tbody id="tableBody">
            <!-- Os dados da tabela serão carregados aqui -->
        </tbody>
    </table>

    <div id="modal" class="modal">
        <div class="modal-content">
        <span class="close-button">&times;</span>
                <div class="login-section">
                    <h2 style="font-size:22pt">Preencha as Informações</h2>
                        <section action="">
                            <div class="input-field">
                                <input type="text" name="username" id="username" placeholder="Digite o Nome da Instituição" >
                            </div>
                            <div class="input-field">
                                <input type="text" name="text" id="text" placeholder="Digite a Localidade">
                            </div>
                            <div class="input-field">
                                <input type="text" name="text" id="text" placeholder="Digite a Natureza">
                            </div>
                            <div class="input-field">
                                <input type="text" name="text" id="text" placeholder="Digite a Zona">
                            </div>
                            <div class="input-field">
                                <input type="text" name="text" id="text" placeholder="Digite o Endereço">
                            </div>
                            <div>
                                <input type="submit" value="Cancelar" id="closeModalBtn">
                                <input type="submit" value="Adicionar" id="saveBtn">
                            </div>
                        </section>
                </div>
        </div>
    </div>