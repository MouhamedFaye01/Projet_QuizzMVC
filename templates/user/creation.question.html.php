<div class="question">

    <h1 class="grand">PARAMÉTRER VOTRE QUESTION</h1>
    <div class="petit">
       <form action="<?= WEB_ROOT ?>" method="POST" id="formQuestion">
       <input type="hidden" name="controller" value="user">
       <input type="hidden" name="action" value="addQuizz">

       <div class="champ1">
            <label for="">Questions</label>
            <input id="uno"type="text" name="question" >
            <small></small>
        </div>

        <div class="champ2">
            <label for="">Nbre de points</label>
            <button onclick="minus()" type="button">-</button>
            <input id="count" type="text" name="point" class="dos" value="1">
            <button onclick="plus()" type="button">+</button>
            <span id="errorChoice"></span>

        </div>

        <div class="champ1">

            <label for="">Type de réponse</label>
            
            <select name="repChoice" id="repChoice" onchange="choice()">
        
                <option disabled selected>Donnez le type de réponse</option>
                <option value="repMultiple">Reponse Multiple</option>
                <option value="repSimple">Réponse Simple</option>
                <option value="repText">Réponse Texte</option>
            </select>
            
            <button type="button" id="btnChoice" class="btnChoice" onclick=addInput()>+</button>
            <small></small>
            
        </div>
        
        <input type="hidden" name="nbrReponse" id="nbrReponse">
        <div id="champ4" class="champ4">

        </div>

        <button class="enregistrer" id="saveQuestion">Enregistrer</button>
       </form>

 
    </div>

</div>
