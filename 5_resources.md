---
layout: page
title: "Resources"
description: "ʿAjāʾib al-maṣnūʿāt fī ʿālam al-raqmiyyāt"
permalink: /resources/
header-img: "images/thematic_covers/alburaq_standrews_ms.jpg"
---

<section class="post-topmatter">
<p class="imagecredit"><b>Cover:</b> al-Buraq, an illustration from “The Book of Wonders” (<a href='https://standrewsrarebooks.wordpress.com/2013/07/01/52-weeks-of-inspiring-illustrations-week-50-the-book-of-wonders/' target='_blank'>a manuscript @ St.Andrews University</a>)</p>
<section class="share"> 
<a class="icon-twitter" href="http://twitter.com/share?text=About Maxim Romanov&amp;url=http://maximromanov.github.io/about/"
onclick="window.open(this.href, 'twitter-share', 'width=550,height=235');return false;">
<span class="hidden">Twitter</span>
</a>
<a class="icon-facebook" href="https://www.facebook.com/sharer/sharer.php?u=http://maximromanov.github.io/about/"
onclick="window.open(this.href, 'facebook-share','width=580,height=296');return false;">
<span class="hidden">Facebook</span>
</a>
<a class="icon-google-plus" href="https://plus.google.com/share?url=http://maximromanov.github.io/about/"
onclick="window.open(this.href, 'google-plus-share', 'width=490,height=530');return false;">
<span class="hidden">Google+</span>
</a>
</section>
</section>

<center>*in progress*</center>

{% assign postsTemp = site.posts | sort: 'title' %}
{% for post in postsTemp %}
<ul class="post-list">
{% if post.categories contains "resources" %}
<li><a href="../{{ post.url }}">
<b>{{ post.title }}</b>{% if post.description %}, {{ post.description }}{% endif %}
</a><br><br>
</li>
</ul>
{% endif %}
{% endfor %}


{% comment %}

## Viral Texts

**URL**: [viraltexts.org](http://viraltexts.org/)

## Visualizing English Print

**URL**: [graphics.cs.wisc.edu/VEPsite/](http://graphics.cs.wisc.edu/VEPsite/)

{% endcomment %}