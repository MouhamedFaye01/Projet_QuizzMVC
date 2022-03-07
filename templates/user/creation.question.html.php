<div class="question">

    <h1 class="grand">PARAMÉTRER VOTRE QUESTION</h1>
    <div class="petit">
        <div class="champ1">
            <label for="">Questions</label>
            <input id="uno"type="text">
        </div>

        <div class="champ2">
            <label for="">Nbre de points</label>
            <input id="dos"type="text">
        </div>

        <div class="champ3">
            <label for="">Type de réponse</label>
            <select name="repChoice" id="repChoice" onchange="choix()">
                <option disabled selected>Donnez le type de réponse</option>
                <option value="repMultiple">Reponse Multiple</option>
                <option value="repSimple">Réponse Simple</option>
                <option value="repText">Réponse Texte</option>
            </select>
            <button class="btnChoice">+</button>
        </div>

        <div class="champ4">
            <label for="">Réponse 1</label>
            <input id="quatro"type="text" >
            <img class="supp"src="<?=WEB_PUBLIC."img".DIRECTORY_SEPARATOR."ic-supprimer.png"?>" alt="">

        </div>

        <button class="enregistrer">Enregistrer</button>

 
    </div>

</div>

<script>
    function choix() {

       
        
    }
</script>