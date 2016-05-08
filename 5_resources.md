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

<center><i>in progress</i></center>


{% assign newCats = site.categories | sort %}
{% for tag in newCats %}
  <ul class="post-list">
    {% assign pages_list = tag[1] %}  
    {% for post in pages_list %}
      {% if post.title != null %}
      {% if group == null or group == post.group %}
      {% if post.categories contains 'Resources' %}
      <li>
      <a href="{{ site.url }}{{ post.url }}">
      <b>{{ post.title }}</b>
      <span class="entry-date">
      <time datetime="{{ post.date | date_to_xmlschema }}" itemprop="datePublished">
      {{ post.date | date: "%B %d, %Y" }}
      </time>
      </span>
      </a>
      <br/>
      <p>{{ post.description }}</p>
      </li>
      {% endif %}
      {% endif %}
      {% endif %}
    {% endfor %}
    {% assign pages_list = nil %}
    {% assign group = nil %}
  </ul>
{% endfor %}


{% comment %}

## Viral Texts

**URL**: [viraltexts.org](http://viraltexts.org/)

## Visualizing English Print

**URL**: [graphics.cs.wisc.edu/VEPsite/](http://graphics.cs.wisc.edu/VEPsite/)

{% endcomment %}