<?php
    $titre = "Achat";
    $page = "achat";
    include  "../header.php";
    $amount = 0.01;
?>

<div class="content mt-lg-4">
    <span class="listeAchat">
        <div class="detailAchat">
            <div class="test1">Figurine de 02</div>
            <div class="test2">20,99</div>
        </div>    
    </span>
    <div class="resume">
        <span class="resumeListe">
            <div> Sous total hors taxe : 83,96$</div>
            <div> Total après taxe : <?php echo(92.35)?></div>
        </span>
        <span class="boutonAchat mt-lg-4">
            <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
	            <input type="hidden" name="charset" value="utf-8"/>
	            <input type="hidden" name="business" value="figureitquebec@gmail.com"/>
	            <input type="hidden" name="cmd" value="_xclick"/>
	            <input type="hidden" name="item_name" value="Commande de figurine sur FigureIt"/>
	            <input type="hidden" name="item_number" value="1"/>
	            <input type="hidden" name="amount" value="<?php echo($amount)?>"/>
	            <input type="hidden" name="currency_code" value="CAD"/>
                <input type="hidden" name="return" value="https://www.figureit.fr/"/>
	            <input type="submit" id="submit" value="Passer la commande"/>
            </form>
        </span>
    </div>
</div>