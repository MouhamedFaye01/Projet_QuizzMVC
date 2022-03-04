

<div class="contentInscription">
<form action="<?= WEB_ROOT ?>" method="POST">
<input type="hidden" name="controller" value="securite">
        <input type="hidden" name="action" value="inscription">


    <input type="hidden" name="role" value="<?= isset($_SESSION[KEY_USER_CONNECT]) ? "ROLE_ADMIN" : "ROLE_JOUEUR" ?>">
    <input type="hidden" name="score" value="0">
    <div class="inscription">

    <label for="nom">Nom</label>
    <input type="text" name="nom">

    <label for="prenom">Prenom</label>
    <input type="text" name="prenom">

    <label for="nom">Login</label>
    <input type="text" name="login">

    <label for="nom">Password</label>
    <input type="password" name="password">

    <label for="nom">Confirmer Password</label>
    <input type="password" name="confirm">

<label for="Avatar"></label>   
 <input type="file" name="" id="" accept=".jpg .jpeg .png" name="avatar">

 <button >Creer Compte</button>

</div>
</form>
</div>
