
<style>
label, p
	{
	color:white;
	}
</style>
<div id="content" style="border-radius:15px">

<form>
<p>Introduce 8 caracteres de la "a" a la "z" y del "0"-"9" sin espacios</p><br />
<label for="contrasenaantigua" >Contraseña Antigua:&nbsp;</label><input type="text" id="contrasenaantigua" name="contrasenaantigua" readonly value="<?php echo $_GET['pass']; ?>" /><br /><br />
<label for="contrasenanuevaa">Contraseña Nueva:&nbsp;</label><input  type="text" id="contrasenanueva" name="contrasenanueva" maxlength="8" /><br /><br />
<input type="submit"  onclick="cambiar('<?php echo $_GET['uskey']; ?>')" value="Cambiar contrasena"/>
</form>
</div>