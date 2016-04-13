<?php

require_once 'simple_html_dom.php';

$html = new simple_html_dom();

$html->load_file('http://awardsdatabase.oscars.org/ampas_awards/DisplayMain.jsp?curTime=1460423224083');

