---
layout: page
title: Directions of Inquiry
permalink: /projects/
---

<center>
<ul class="tag-box inline">
  {% assign tags_list = site.categories | sort %}
  {% if tags_list.first[0] == null %}
  {% for tag in tags_list %}
  <li><a href="#{{ tag }}">{{ tag }}<span>{{ site.tags[tag].size }}</span></a></li>
  {% endfor %}
  {% else %}
  {% for tag in tags_list %}
  <li><a href="#{{ tag[0] }}">{{ tag[0] }} <span>{{ tag[1].size }}</span></a></li>
  {% endfor %}
  {% endif %}
  {% assign tags_list = nil %}
</ul>
</center>
<hr>


{% assign newCats = site.categories | sort %}
{% for tag in newCats %}
  <h2 id="{{ tag[0] }}"><em>{{ tag[0] }}</em></h2>
  <ul class="post-list">
    {% assign pages_list = tag[1] %}  
    {% for post in pages_list %}
      {% if post.title != null %}
      {% if group == null or group == post.group %}
      {% if post.tags contains 'Blogpost' %}
      <li><a href="{{ site.url }}{{ post.url }}">{{ post.title }}</a><span class="entry-date"><time datetime="{{ post.date | date_to_xmlschema }}" itemprop="datePublished">{{ post.date | date: "%B %d, %Y" }}</time></span></li>
      {% endif %}
      {% endif %}
      {% endif %}
    {% endfor %}
    {% assign pages_list = nil %}
    {% assign group = nil %}
  </ul>
{% endfor %}