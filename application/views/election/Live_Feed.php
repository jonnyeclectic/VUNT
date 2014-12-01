<?php			$add_vote = FALSE;
			for ($i = 0; $i <= 23; $i++) {
    			$count[$i] = $this->ion_auth->vote_info($i,$add_vote);
			}
			$sum = array_sum($count);?>
			
<dl style="width: 300px">
<dt>12 a.m.</dt>
<dd><div id="data-one" class="bar" style="width: <?php echo  $count['0']/$sum * 100;?>%"><?php echo $count['0']?></div></dd>
<dt>1 a.m.</dt>
<dd><div id="data-two" class="bar" style="width: <?php echo  $count['1']/$sum * 100;?>%"><?php echo $count['1']?></div></dd>
<dt>2 a.m.</dt>
<dd><div id="data-three" class="bar" style="width: <?php echo  $count['2']/$sum * 100;?>%"><?php echo $count['2']?></div></dd>
<dt>3 a.m.</dt>
<dd><div id="data-two" class="bar" style="width: <?php echo  $count['3']/$sum * 100;?>%"><?php echo $count['3']?></div></dd>
<dt>4 a.m.</dt>
<dd><div id="data-two" class="bar" style="width: <?php echo  $count['4']/$sum * 100;?>%"><?php echo $count['4']?></div></dd>
<dt>5 a.m.</dt>
<dd><div id="data-two" class="bar" style="width: <?php echo  $count['5']/$sum * 100;?>%"><?php echo $count['5']?></div></dd>
<dt>6 a.m.</dt>
<dd><div id="data-two" class="bar" style="width: <?php echo  $count['6']/$sum * 100;?>%"><?php echo $count['6']?></div></dd>
<dt>7 a.m.</dt>
<dd><div id="data-two" class="bar" style="width: <?php echo  $count['7']/$sum * 100;?>%"><?php echo $count['7']?></div></dd>
<dt>8 a.m.</dt>
<dd><div id="data-two" class="bar" style="width: <?php echo  $count['8']/$sum * 100;?>%"><?php echo $count['8']?></div></dd>
<dt>9 a.m.</dt>
<dd><div id="data-two" class="bar" style="width: <?php echo  $count['9']/$sum * 100;?>%"><?php echo $count['9']?></div></dd>
<dt>10 a.m.</dt>
<dd><div id="data-two" class="bar" style="width: <?php echo  $count['10']/$sum * 100;?>%"><?php echo $count['10']?></div></dd>
<dt>11 a.m.</dt>
<dd><div id="data-two" class="bar" style="width: <?php echo  $count['11']/$sum * 100;?>%"><?php echo $count['11']?></div></dd>
<dt>12 p.m.</dt>
<dd><div id="data-two" class="bar" style="width: <?php echo  $count['12']/$sum * 100;?>%"><?php echo $count['12']?></div></dd>
<dt>1 p.m.</dt>
<dd><div id="data-two" class="bar" style="width: <?php echo  $count['13']/$sum * 100;?>%"><?php echo $count['13']?></div></dd>
<dt>2 p.m.</dt>
<dd><div id="data-two" class="bar" style="width: <?php echo  $count['14']/$sum * 100;?>%"><?php echo $count['14']?></div></dd>
<dt>3 p.m.</dt>
<dd><div id="data-two" class="bar" style="width: <?php echo  $count['15']/$sum * 100;?>%"><?php echo $count['15']?></div></dd>
<dt>4 p.m.</dt>
<dd><div id="data-two" class="bar" style="width: <?php echo  $count['16']/$sum * 100;?>%"><?php echo $count['16']?></div></dd>
<dt>5 p.m.</dt>
<dd><div id="data-two" class="bar" style="width: <?php echo  $count['17']/$sum * 100;?>%"><?php echo $count['17']?></div></dd>
<dt>6 p.m.</dt>
<dd><div id="data-two" class="bar" style="width: <?php echo  $count['18']/$sum * 100;?>%"><?php echo $count['18']?></div></dd>
<dt>7 p.m.</dt>
<dd><div id="data-two" class="bar" style="width: <?php echo  $count['19']/$sum * 100;?>%"><?php echo $count['19']?></div></dd>
<dt>8 p.m.</dt>
<dd><div id="data-two" class="bar" style="width: <?php echo  $count['20']/$sum * 100;?>%"><?php echo $count['20']?></div></dd>
<dt>9 p.m.</dt>
<dd><div id="data-two" class="bar" style="width: <?php echo  $count['21']/$sum * 100;?>%"><?php echo $count['21']?></div></dd>
<dt>10 p.m.</dt>
<dd><div id="data-two" class="bar" style="width: <?php echo  $count['22']/$sum * 100;?>%"><?php echo $count['22']?></div></dd>
<dt>11 p.m.</dt>
<dd><div id="data-two" class="bar" style="width: <?php echo  $count['23']/$sum * 100;?>%"><?php echo $count['23']?></div></dd>
<?php $sum = array_sum($count);?>
</dl>
<style type="text/css">
* { font-family: Helvetica, Arial; font-size: 12px;}

dt { float: left; padding: 4px; }

.bar {
margin-bottom: 10px;
color: #fff;
padding: 4px;
text-align: center;
background: -webkit-gradient(linear, left top, left bottom, from(#ff7617), to(#ba550f));
background-color: #ff7617;
-webkit-box-reflect: below 0 -webkit-gradient(linear, left top, left bottom, from(rgba(0,0,0,0)), to(rgba(0,0,0,0.25)));
-webkit-border-radius: 2px;
-moz-border-radius: 2px;
border-radius: 2px;
-webkit-animation-name:bar;
-webkit-animation-duration:0.5s;
-webkit-animation-iteration-count:1;
-webkit-animation-timing-function:ease-out;
}

}
</style><?php	