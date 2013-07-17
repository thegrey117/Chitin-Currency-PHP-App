<html>
<body background="background.png" Align="center">
<font color="#FFFFFF">

<P> "<?php echo $_POST["PName"]; ?>" <B>wishes to convert</B> "<?php echo $_POST["ItemCount"]; ?>" <B>of Data Value:</B></P>

<P><?php echo $_POST["original"]; ?></P>

<IMG SRC="/Items/<?php echo $_POST["original"]; ?>.png"></IMG></P>

<P><B>To Data Value:</B></P>

<P><?php echo $_POST["convertto"]; ?></P>

<P><IMG SRC="/Items/<?php echo $_POST["convertto"]; ?>.png"></IMG></P>

<P>

Result =

<?php
############################################################################

//Assign input to variables:

$pname=$_POST["PName"];
$itemcount=$_POST["ItemCount"];
$original=$_POST["original"];
$convertto=$_POST["convertto"];

############################################################################

//Block Values (In Chitins) Make price updates here:

$chitin=1.00; //does not change!!
$redstonedust=1.00;
$ironingot=5.00;
$sandstack=5.00;
$netherquartz=5.00;
$goldingot=20.00;
$glowstoneblock=50.00;
$emerald=75.00;
$diamond=200.00;

############################################################################

//TotalItems Global Variable (needed to calculate stacks)

$TotalItems;

############################################################################

//calculation/conversion function

function calcblocks()

{

global $TotalItems,$itemcount,$convertto,$chvalue,$chitin,$redstonedust,$ironingot,$sandstack,$netherquartz,$goldingot,$glowstoneblock,$emerald,$diamond;

switch ($convertto)

{

//to Chitins:

case "64":

//run conversion:

$TotalItems = ($itemcount * $chvalue) / $chitin;
	echo $TotalItems;
break;

//to Iron Ingot:

case "265":

//run conversion:

$TotalItems = ($itemcount * $chvalue) / $ironingot;
	echo $TotalItems;
break;

//to Redstone Dust:

case "331":

//run conversion:

$TotalItems = ($itemcount * $chvalue) / $redstonedust;
	echo $TotalItems;
break;

//to Sand Stack:

case "12":

//run conversion:

$TotalItems = ($itemcount * $chvalue) / $sandstack;
	echo $TotalItems;
break;

//to Nether Quartz:

case "406":

//run conversion:

$TotalItems = ($itemcount * $chvalue) / $netherquartz;
	echo $TotalItems;
break;

//to Gold Ingot:

case "266":

//run conversion:

$TotalItems = ($itemcount * $chvalue) / $goldingot;
	echo $TotalItems;
break;

//to Glowstone Block:

case "89":

//run conversion:

$TotalItems = ($itemcount * $chvalue) / $glowstoneblock;
	echo $TotalItems;
break;

//to Emerald:

case "388":

//run conversion:

$TotalItems = ($itemcount * $chvalue) / $emerald;
	echo $TotalItems;
break;

//to Diamond:

case "264":

//run conversion:

$TotalItems = ($itemcount * $chvalue) / $diamond;
	echo $TotalItems;
break;

}

}

############################################################################

//maintain transaction limit:

if ($itemcount>"6400")

{

echo "You have attempted to convert more than 6400 Items!";

}

############################################################################

else

{

//item conversion calculations:

switch ($original)

{

//from Chitins:

case "64":
$chvalue=$chitin;

//run convert function

calcblocks();

break;

//from Iron Ingot:

case "265":
$chvalue=$ironingot;

//run convert function

calcblocks();

break;

//from Redstone Dust:

case "331":
$chvalue=$redstonedust;

//run convert function

calcblocks();

break;

//from Sand Stack:

case "12":
$chvalue=$sandstack;

//run convert function

calcblocks();

break;

//from Gold Ingot:

case "266":
$chvalue=$goldingot;

//run convert function

calcblocks();

break;

//from Glowstone Block:

case "89":
$chvalue=$glowstoneblock;

//run convert function

calcblocks();

break;

//from Emerald:

case "388":
$chvalue=$emerald;

//run convert function

calcblocks();

break;

//from Diamond:

case "264":
$chvalue=$diamond;

//run convert function

calcblocks();

break;

//from Nether Quartz:

case "406":
$chvalue=$netherquartz;

//run convert function

calcblocks();

break;

default:

echo "You fucked up! Check your inputs!!!";

break;
}
############################################################################
}
?>

</P>

<?php

############################################################################

//On to the fun stuff!! MCMYADMIN API

//Create Stack and Item Variables

$stack = floor($TotalItems/64);
$item = ($TotalItems%64);

############################################################################

?>
</P>

<P>
<?php

############################################################################

//Outputs the number of stacks and items to be given.

switch ($convertto)

{

case "12":

echo "above is the number of sand stacks.";

break;

default:

echo $stack; echo " stack(s) and "; echo $item; echo " remaining item(s).";

break;

}

############################################################################

?>
</P>
<P>
Here is the total commands to be entered for stacks:
</P>

<P>
<?php
switch ($convertto)

{

case "12":

for ($i=1; $i<=$TotalItems; $i++)
  { //  /give playername itemid itemcount(64)
  echo "/give ".$pname." ".$convertto." "."64"."<br/>";
  }

break;

default:

for ($i=1; $i<=$stack; $i++)
  { //  /give playername itemid itemcount(64)
  echo "/give ".$pname." ".$convertto." "."64"."<br/>";
  }
  
break;

}
?>
</P>

<P>
Here is the command to be entered for the remaining items:
</P>

<P>

<?php

switch ($convertto)

{

case "12":

echo "No remaining items (Sand).";

break;

default:

echo "/give ".$pname." ".$convertto." ".$item."<br/>";

break;

}
?>

</P>
</font>
</body>
</html>