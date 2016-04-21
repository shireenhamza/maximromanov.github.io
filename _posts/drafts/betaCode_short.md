## betaCode and One-To-One Transliteration

|  : betacode :  |  : translit :  |  : Arabic letter :  |
|:----------:|:-----------------:|:---------------:|
| **\_a** | ā | *alif* |
| **b** | b | *bāʾ* |
| **t** | t | *tāʾ* |
| **\_t** | ṯ | *thāʾ* |
| **^g, j** | ǧ | *jīm* |
| **\*h** | ḥ | *ḥāʾ* |
| **\_h** | ḫ | *khāʾ* |
| **d** | d | *dāl* |
| **\_d** | ḏ | *dhāl* |
| **r** | r | *rā’* |
| **z** | z | *zayn* |
| **s** | s | *sīn* |
| **^s** | š | *shīn* |
| **\*s** | ṣ | *ṣād* |
| **\*d** | ḍ | *ḍād* |
| **\*t** | ṭ | *ṭāʾ* |
| **\*z** | ẓ | *ẓāʾ* |
| **`** | ʿ | *‘ayn* |
| **\*g** | ġ | *ghayn* |
| **f** | f | *fāʾ* |
| **\*k, q** | ḳ | *qāf* |
| **k** | k | *kāf* |
| **l** | l | *lām* |
| **m** | m | *mīm* |
| **n** | n | *nūn* |
| **h** | h | *hā’* |
| **w** | w | *wāw* |
| **\_u** | ū | *wāw* |
| **y** | y | *yāʾ* |
| **\_i** | ī | *yāʾ* |

## Non-alphabetic letters

| : betacode : | : translit : | : Arabic : |
|:----------:|:-----------------:|:---------------:|
| **'** | ʾ | *ḥamzaŧ* |
| **/a** | á | *alif maqṣūraŧ* |
| **=t** | ŧ | *tāʾ marbūṭaŧ* |

## Vowels

| : betacode :  | : translit : | : Arabic : |
|:----------:|:-----------------:|:---------------:|
| **~a** | ã | *dagger alif* |
| **u** | u | *ḍammaŧ* |
| **i** | i | *kasraŧ* |
| **a** | a | *fatḥaŧ* |
| **\*n** | ȵ | *n* of *tanwīn* |
| **\*a** | å | *silent alif* |
| **\*w** | ů | *silent wāw* |
| **?u** | ủ | final *ḍammaŧ* \* |
| **?i** | ỉ | final *kasraŧ* \* |
| **?a** | ả | final *fatḥaŧ* \* |

## Basic principles:
Every Arabic letter is betaCoded with its one-letter equivalent,
preceded (if necessary) with a technical character that is similar to a diacritical mark in the transliterated version. Thus, most common symbols are as follows:

#### *General*
* **\_** (underscore), if a letter can be transliterated with *macron*/*breve* below or above (*ā*, *ṯ*, *ḫ*, *ḏ*, *ū*, *ī*)
* **.** (period), or  <b>\*</b> (asterisk), if a letter can be transliterated transliterated with *dot* below or above (*ḥ*, *ṣ*, *ḍ*, *ṭ*, *ẓ*, *ġ*, *ḳ*)
* **^** (caret), if a letter can be transliterated with *caron* (*ǧ*, *š*)

#### *Specifics*
* attached prepositions/conjunctions and pronominal suffixes must be separated with “-” (mostly relevant for text alignment, treebanking,  and general readability):
	* ``` bi-Llah?i  ```
	* ``` fa-_dahaba ```
* add “?” before “optional” final vowels that are usually dropped in transliteration and pronounciation (mostly relevant  for transliteration):
	* ``` bi-Llah?i  ```, but not:
	* ``` fa-_dahaba ```	
* *tāʾ marbūṭaŧ*: add “+” after *tāʾ marbūṭaŧ*, if the first word of *iḏāfaŧ* (mostly relevant for transliteration):
	* ``` `_amma:t+u Ba.gd_ada ```, but:
	* ``` al-`_amma:tu f_i Ba.gd_ada ```
* transliterating *tanwīn*:
	* ```.n```
		* ```?u.n```
		* ```?i.n```
		* ```?a.n```
* silent *wāw* and *alif*:
	* `.w` (`Amr?u.n.w`, for عَمْرٌو)
	* `.a` (```wa-fa`al_u.a```, for وَفَعَلُوا)
