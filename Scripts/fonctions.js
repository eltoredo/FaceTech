<script>

function surligne(champ, erreur)
{
   if(erreur)
      champ.style.backgroundColor = "#fba";
   else
      champ.style.backgroundColor = "";
};

function verifMDP(champ)
{
   if(champ.value.length < 6 || champ.value.length > 25)
   {
      surligne(champ, true);
      return false;
   }
   else
   {
      surligne(champ, false);
      return true;
   }
};

function verifMail(champ)
{
   var regex = /^[a-z0-9-_]+@(intechinfo\.fr|esiea\.fr)$/i;
   if(!regex.test(champ.value))
   {
      surligne(champ, true);
      return false;
   }
   else
   {
      surligne(champ, false);
      return true;
   }
};

function verifDate(champ)
{
   var regex = /^[0-9]{4}\/[0-1][0-9]\/[0-3][0-9]$/;
   if(!regex.test(champ.value))
   {
      surligne(champ, true);
      return false;
   }
   else
   {
      surligne(champ, false);
      return true;
   }
};

function verifCP(champ)
{
   if(champ.value.length == 5)
   {
     surligne(champ, false);
     return true;
   }
   else
   {
     surligne(champ, true);
     return false;

   }
};

function verifPV(champ)
{
   if(champ.value.length > 0)
   {
     surligne(champ, false);
     return true;
   }
   else
   {
     surligne(champ, true);
     return false;

   }
};

var timeout = setInterval(reloadChat, 100);
console.log(timeout);

function reloadChat()
{
  $('#chat').load('chat.php');
};

function scroll()
{
  element = document.getElementById('chat');
  element.scrollTop = element.scrollHeight;
};

function projets()
{
    $('#cp').load('projets.php');
};

function cours()
{
    $('#cp').load('cours.php');
};

function profil()
{
    $('#all').load('infosprofil.php');
};

function profilprojets()
{
    $('#all').load('profilprojets.php');
};

function profilcours()
{
    $('#all').load('profilcours.php');
};

</script>