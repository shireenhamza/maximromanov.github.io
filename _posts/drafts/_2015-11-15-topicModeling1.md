---
title:			'30,000 Biographies and Topic Modeling'
subtitle:		'Take 1'
author:			Maxim Romanov
layout:			post
image:			/images/loc_photos/mosul_16213d.jpg
imagecredit:	"Iraq. Mosul. Mosul bazaars and river scenes on the Tigris. The shoe market <a href='http://hdl.loc.gov/loc.pnp/matpc.16213' target='_blank'>(Library of Congress, LC-DIG-matpc-16213)</a>"
categories:
  - Coding
  - Corpora
  - Methods
tags:
  - Blogpost
  - Topic modeling
---

<figure class="fit">
  <a href="{{ site.url }}/images/tm01.png" title="">
  <img src="{{ site.url }}/images/tm01.png">
  </a>
  <figcaption>
    “Topics” identified in the set of almost 30,000 biographies from the <b>Taʾrīḫ al-islām</b>
  </figcaption>
</figure>

al-Ǧāmiʿ al-kabīr

I have been planning to try topic modeling on Arabic biographical texts for quite a while already, but other things kept me busy. Plus, the complexities of Arabic kept my enthusiasm in check. In Arabic, pretty much every word has many different forms due to morphological richness of the language. Even the same morpological form of a word may multiple endlessly due to the plethora of “stackable” prefixes and suffixes. For example, a morphologically simple word _kitāb_, “book”, has over 130 different forms!

<figure class="fit">
<p class="arabic">
كتاب (1,079,929) ، الكتاب (740,262) ، كتابه (237,362) ، كتابا (95,816) ، وكتاب (72,462) ، بكتاب (44,079) ، بالكتاب (32,545) ، كتابي (27,790) ، والكتاب (24,058) ، كتابنا (19,275) ، لكتاب (17,543) ، كتابك (12,932) ، للكتاب (12,848) ، الكتابين (10,138) ، بكتابه (7,596) ، كتابهم (6,981) ، ككتاب (6,784) ، كتابيه (4886) ، كتابكم (4,682) ، الكتابي (4,467) ، كتابها (3,227) ، لكتابه (2,533) ، بكتابك (2,522) ، وكتابا (2,249) ، كتابين (2,167) ، ولكتابه (1,941) ، فالكتاب (1,839) ، كتابان (1,492) ، بكتابي (1,401) ، كتابى (1,153) ، وككتاب (1,073) ، بكتابهم (1,031) ، وكتابنا (999) ، وبالكتاب (981) ، فكتاب (966) ، وكتابي (915) ، بكتابكم (847) ، كالكتاب (804) ، الكتابان (774) ، وكتابهم (754) ، وكتابها (528) ، وكتابك (526) ، وبكتابه (505) ، كتابهما (475) ، وبكتابك (427) ، بكتابنا (420) ، وبكتاب (405) ، فكتابه (331) ، وكتابكم (327) ، لكتابي (314)
</p>
  <figcaption>
    Top 50 forms of the word <i>kitāb</i>, “book”, in the collection of about 10,500 texts (1,5 billion words).
  </figcaption>
</figure>


[Perseus Digital Library](http://www.perseus.tufts.edu/hopper/).

<div id="dynamic"><svg width="750" height="384"><g class="venn-area venn-circle venn-sets-A"><path d="
M 346.48597001051166 100.79015857580998 
m -85.79015857580997 0 
a 85.79015857580997 85.79015857580997 0 1 0 171.58031715161994 0 
a 85.79015857580997 85.79015857580997 0 1 0 -171.58031715161994 0" style="fill-opacity: 0.25; fill: rgb(31, 119, 180);"></path><text text-anchor="left" dy=".35em" x="350" y="100" style="fill: rgb(31, 119, 180)"><tspan x="350" y="100" dy="0.35em">ShiaOnlineLibrary.com</tspan></text></g><g class="venn-area venn-circle venn-sets-B"><path d="
M 203.90825723824236 212.81561417543597 
m -156.18438582456403 0 
a 156.18438582456403 156.18438582456403 0 1 0 312.36877164912806 0 
a 156.18438582456403 156.18438582456403 0 1 0 -312.36877164912806 0" style="fill-opacity: 0.25; fill: rgb(255, 127, 14);"></path><text text-anchor="middle" dy=".35em" x="120" y="212" style="fill: rgb(255, 127, 14);" ><tspan x="120" y="212" dy="0.35em">Shamela.ws</tspan></text></g><g class="venn-area venn-circle venn-sets-C"><path d="
M 291.1311740012473 212.81561417543597 
m -98.04420271925282 0 
a 98.04420271925282 98.04420271925282 0 1 0 196.08840543850565 0 
a 98.04420271925282 98.04420271925282 0 1 0 -196.08840543850565 0" style="fill-opacity: 0.25; fill: rgb(44, 160, 44);"></path><text text-anchor="middle" dy=".35em" x="373" y="228" style="fill: rgb(44, 160, 44);" ><tspan x="373" y="210" dy="0.35em">al-Ǧāmiʿ al-kabīr</tspan></text></g><g class="venn-area venn-intersection venn-sets-A_B"><path d="
M 266.51627810002987 69.72893380592618 
A 156.18438582456403 156.18438582456403 0 0 1 357.74513727230175 185.8382770795938 
A 85.79015857580997 85.79015857580997 0 0 1 266.51627810002987 69.72893380592618" style="fill-opacity: 0;"></path><text text-anchor="middle" dy=".35em" x="279" y="97" style="fill: rgb(200, 0, 0);" font-size="20"><tspan x="279" y="97" dy="0.35em"></tspan>118</text></g><g class="venn-area venn-intersection venn-sets-A_C"><path d="
M 262.6505247971073 118.99920672042488 
A 98.04420271925282 98.04420271925282 0 0 1 382.9530220440803 178.4439120230428 
A 85.79015857580997 85.79015857580997 0 0 1 262.6505247971073 118.99920672042488" style="fill-opacity: 0;"></path><text text-anchor="middle" dy=".35em" x="366" y="171" style="fill: rgb(200, 0, 0);" font-size="20"><tspan x="366" y="171" dy="0.35em"></tspan>50</text></g><g class="venn-area venn-intersection venn-sets-B_C"><path d="
M 332.2502958221003 301.8205775625179 
A 98.04420271925282 98.04420271925282 0 1 1 332.2502958221003 123.81065078835405 
A 156.18438582456403 156.18438582456403 0 0 1 332.2502958221003 301.8205775625179" style="fill-opacity: 0;"></path><text text-anchor="middle" dy=".35em" x="278" y="239" style="fill: rgb(200, 0, 0);" font-size="20"><tspan x="278" y="239" dy="0.35em"></tspan>1,689</text></g><g class="venn-area venn-intersection venn-sets-A_B_C"><path d="
M 262.6505247971073 118.99920672042488 
A 98.04420271925282 98.04420271925282 0 0 1 332.2502958221003 123.81065078835405 
A 156.18438582456403 156.18438582456403 0 0 1 357.74513727230175 185.8382770795938 
A 85.79015857580997 85.79015857580997 0 0 1 262.6505247971073 118.99920672042488" style="fill-opacity: 0;"></path><text text-anchor="middle" dy=".35em" x="313" y="147" style="fill: rgb(200, 0, 0);" font-size="20"><tspan x="313" y="147" dy="0.35em"></tspan>365</text></g>

<g class="venn-area venn-intersection venn-sets-A_B_C"><text text-anchor="left" dy=".35em" x="400" y="280" style="fill: rgb(0, 0, 0);" font-size="20"><tspan x="380" y="300" dy="0.35em"></tspan>ShiaOnlineLibrary.com: 1,810 titles</text></g>

<g class="venn-area venn-intersection venn-sets-A_B_C"><text text-anchor="right" dy=".35em" x="400" y="305" style="fill: rgb(0, 0, 0);" font-size="20"><tspan x="400" y="325" dy="0.35em"></tspan>Shamela.ws: 5,999 titles</text></g>

<g class="venn-area venn-intersection venn-sets-A_B_C"><text text-anchor="right" dy=".35em" x="400" y="330" style="fill: rgb(0, 0, 0);" font-size="20"><tspan x="400" y="350" dy="0.35em"></tspan>al-Ǧāmiʿ al-kabīr: 2,364 titles</text></g>


<g class="venn-area venn-intersection venn-sets-A_B_C"><text text-anchor="right" dy=".35em" x="400" y="360" style="fill: rgb(50, 0, 0);" font-size="24"><tspan x="400" y="375" dy="0.35em"></tspan>UNIQUE TITLES: 7,895</text></g>

</svg></div>


