<section>
    <div class="search" style="display:flex;margin-top:20px;">
        <div class='pesquisa-container'>
            <select style="height:30px;" class="columns-infor-choice" name="columns-infor-choice">
                <option class='table-option-choice' value="Compromissos">Compromissos</option>
                <option class='table-option-choice' value="Eixo">Eixo</option>
                <option class='table-option-choice' value="Responsável">Responsável</option>
                <option class='table-option-choice' value="Observações">Observações</option>
                <option class='table-option-choice' value="Situação">Situação</option>
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
                <th class='first-th'>Compromisso</th>
                <th>Eixo</th>
                <th>Responsável</th>
                <th>Observações</th>
                <th>Situação</th>
            </tr>
        </thead>
        <tbody class="tableBody">
            <!-- Os dados da tabela serão carregados aqui -->
        </tbody>
    </table>

</section>