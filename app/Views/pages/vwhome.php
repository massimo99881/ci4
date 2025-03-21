<!--
<!DOCTYPE html>
<html>

<head>
    <title>Home page</title>
</head>

<body>
-->
    <h1>Home page</h1>
    <form action='/Ctrllanguage' method='POST'>
        <input type='submit' value='elenco lingue ci4'>
    </form>
    <hr>
    <form action='/Ctrllanguage/Sel' method='POST'>
        codice = <input type='input' name='chiave' value='1'>
        <input type='submit' value='select lingua'>
    </form>
    <hr>
    <!--
    <form action='index.php?controller=ctrllanguage&action=viewlanguage' method='POST'>
        <label for="order">Ordinato su</label>
        <select id="order" name="order">
            <option value="codice">codice</option>
            <option value="descrizione">descrizione</option>
        </select> <input type='submit' value='elenco lingue ordinate'>
    </form>
    <hr> -->

    <form action='/ctrllanguage/ins' method='POST'>
        <label for="codice">Codice </label>
        <input type='input' name='codice' value=''>
        <label for="descrizione">Descrizione </label>
        <input type='input' name='descrizione' value=''>
        <input type='submit' value='Salva lingua'>
    </form>
     <hr>
     <form action='/ctrllanguage/upd' method='POST'>
        <label for="codice">Codice </label>
        <input type='input' name='codice' value=''>
        <label for="descrizione">Descrizione </label>
        <input type='input' name='descrizione' value=''>
        <input type='submit' value='Modifica lingua'>
    </form>
     <hr>
   <form action='/ctrllanguage/del' method='POST'>
        <label for="codice">Codice </label>
        <input type='input' name='codice' value=''>
        <input type='submit' value='Cancella lingua'>
    </form>

<!--
</body>

</html>
-->