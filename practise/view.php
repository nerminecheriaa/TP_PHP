



<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>book grid </title>
        <link  rel="stylesheet"  href="view.css" > 

</head>
 <body>  
  
     <div id=Books>


     <div class="grid-container">
       <form action='index.php ' method= 'POST' > <div class="grid-item">
                <img src="imageR/atomichabits.jpg"  id="image">
                <p class="title" >Atomic Habits</p>
                <div class="rating1">
                   <span  class="star" onclick="setRating(1,1)">&#9733;</span>
                   <span  class="star" onclick="setRating(2,1)">&#9733;</span>
                   <span class="star" onclick="setRating(3,1)">&#9733;</span>
                   <span  class="star" onclick="setRating(4,1)">&#9733;</span>
                    <span class="star" onclick="setRating(5,1)">&#9733;</span>
                </div>
                <p class="description">Atomic Habits (EXP): An Easy & Proven Way to Build Good Habits & Break Bad Ones Paperback – Édition internationale, 1 octobre 2019</p>
                 <div><span class="price">19.47£</span> <button name="add" type="submit"  class="button" >add to cart </button></div>
                 <input type="hidden" name ="name" value="atomic habits">
                 
                 
                   
                 

        </div></form>
        <form action='index.php ' method= 'POST' >  <div class="grid-item">
          <img src="imageR/normalpeople.jpg"  id="image">
                <p class="title" >normal people</p>
                <div class="rating2">
                   <span  class="star" onclick="setRating(1,2)">&#9733;</span>
                   <span class="star" onclick="setRating(2,2)">&#9733;</span>
                   <span class="star" onclick="setRating(3,2)">&#9733;</span>
                   <span class="star" onclick="setRating(4,2)">&#9733;</span>
                    <span class="star" onclick="setRating(5,2)">&#9733;</span>
                </div>
                <p class="description">Normal People: One million copies sold and turned into a netflix series</p>
                <div><span class="price">12.29£</span> <button name="add" type="submit" class="button">add to cart</button></div>
                 <input type="hidden" name ="name" value="normal people">
                 

        </div></form>
        
        <div class="grid-item">
                <img src="imageR/prideprejudice.jpg"  id="image">
                <p class="title" >pride and prejudice </p>
                <div class="rating3">
                   <span  class="star" onclick="setRating(1,3)">&#9733;</span>
                   <span  class="star" onclick="setRating(2,3)">&#9733;</span>
                   <span  class="star" onclick="setRating(3,3)">&#9733;</span>
                   <span class="star" onclick="setRating(4,3)">&#9733;</span>
                    <span class="star" onclick="setRating(5,3)">&#9733;</span>
                </div>
                <p class="description">Pride and Prejudice: The Complete Novel, with Nineteen Letters from the Characters' Correspondence, Written and Folded by Hand </p>
                <div><span class="price">32.36£</span> <button class="button">add to cart</button></div>


        </div>
        

       
        <div class="grid-item">
                <img src="imageR/oneday.jpg"  id="image">
                <p class="title" >one day  </p>
                <div class="rating4">
                   <span  class="star" onclick="setRating(1,4)">&#9733;</span>
                   <span class="star" onclick="setRating(2,4)">&#9733;</span>
                   <span  class="star" onclick="setRating(3,4)">&#9733;</span>
                   <span  class="star" onclick="setRating(4,4)">&#9733;</span>
                    <span class="star" onclick="setRating(5,4)">&#9733;</span>
                </div>
                <p class="description">One Day: Now a major Netflix series  </p>
                <div><span class="price">11.05£</span> <button class="button">add to cart</button></div>


        </div>
        <div class="grid-item">
                <img src="imageR/divergent.jpg"  id="image">
                <p class="title" >divetrgent series</p>
                <div class="rating5">
                   <span  class="star" onclick="setRating(1,5)">&#9733;</span>
                   <span class="star" onclick="setRating(2,5)">&#9733;</span>
                   <span  class="star" onclick="setRating(3,5)">&#9733;</span>
                   <span class="star" onclick="setRating(4,5)">&#9733;</span>
                    <span  class="star" onclick="setRating(5,5)">&#9733;</span>
                </div>
                <p class="description"> [Divergent / Insurgent / Allegiant / Four] [By: Roth, Veronica] [July, 2014] </p>
                <div><span class="price">140.09£</span> <button class="button">add to cart</button></div>


        </div>

        <div class="grid-item">
                <img src="imageR/secretgarden.jpg"  id="image">
                <p class="title" >secret garden </p>
                <div class="rating6">
                   <span  class="star" onclick="setRating(1,6)">&#9733;</span>
                   <span class="star" onclick="setRating(2,6)">&#9733;</span>
                   <span class="star" onclick="setRating(3,6)">&#9733;</span>
                   <span  class="star" onclick="setRating(4,6)">&#9733;</span>
                    <span  class="star" onclick="setRating(5,6)">&#9733;</span>
                </div>
                <p class="description"> THE SECRET GARDEN By Frances Hodgson Burnett, ILLUSTRATED BY MB Kork </p>
                <div><span class="price">11.5£</span> <button class="button">add to cart</button></div>


        </div>

        <div class="grid-item">
                <img src="imageR/metamo.jpg"  id="image">
                <p class="title" >The Metamorphosis </p>
                <div class="rating7">
                   <span  class="star" onclick="setRating(1,7)">&#9733;</span>
                   <span class="star" onclick="setRating(2,7)">&#9733;</span>
                   <span class="star" onclick="setRating(3,7)">&#9733;</span>
                   <span  class="star" onclick="setRating(4,7)">&#9733;</span>
                    <span  class="star" onclick="setRating(5,7)">&#9733;</span>
                </div>
                <p class="description"> The Metamorphosis and Other Stories (Oxford World's Classics) (English Edition) </p>
                <div><span class="price">6.15£</span> <button class="button">add to cart</button></div>


        </div>
        <div class="grid-item">
                <img src="imageR/kiterunner.jpg"  id="image">
                <p class="title" >The Kite Runner </p>
                <div class="rating8">
                   <span  class="star" onclick="setRating(1,8)">&#9733;</span>
                   <span  class="star" onclick="setRating(2,8)">&#9733;</span>
                   <span class="star" onclick="setRating(3,8)">&#9733;</span>
                   <span class="star" onclick="setRating(4,8)">&#9733;</span>
                    <span  class="star" onclick="setRating(5,8)">&#9733;</span>
                </div>
                <p class="description"> a world class tragedy by Khaled Housseini </p>
               <div><span class="price">12.29£</span> <button class="button">add to cart</button></div>


        </div>
        <div class="grid-item">
                <img src="imageR/awoman.jpg"  id="image">
                <p class="title" >A Woman is No Man</p>
                <div class="rating9">
                   <span class="star" onclick="setRating(1,9)">&#9733;</span>
                   <span  class="star" onclick="setRating(2,9)">&#9733;</span>
                   <span  class="star" onclick="setRating(3,9)">&#9733;</span>
                   <span  class="star" onclick="setRating(4,9)">&#9733;</span>
                    <span  class="star" onclick="setRating(5,9)">&#9733;</span>
                </div>
                <p class="description"> PRE-ORDER ETAF RUM’S NEW NOVEL, EVIL EYE, NOW – COMING SEPTEMBER 2024.</p>
                <div><span class="price">11.05£</span> <button class="button">add to cart</button></div>


        </div>

        <div class="grid-item">
                <img src="imageR/100.jpg"  id="image">
                <p class="title" >One Hundred Years of Solitude</p>
                <div class="rating10">
                   <span class="star" onclick="setRating(1,10)">&#9733;</span>
                   <span  class="star" onclick="setRating(2,10)">&#9733;</span>
                   <span  class="star" onclick="setRating(3,10)">&#9733;</span>
                   <span  class="star" onclick="setRating(4,10)">&#9733;</span>
                    <span class="star" onclick="setRating(5)">&#9733;</span>
                </div>
                <p class="description">One Hundred Years of Solitude by Gabriel García Marquez </p>
                <div><span class="price">15.3£</span> <button class="button">add to cart</button></div>


        </div>

        <div class="grid-item">
                <img src="imageR/athousand.jpg"  id="image">
                <p class="title" > A Thousand Splendid Suns</p>
                <div class="rating11">
                   <span  class="star" onclick="setRating(1,11)">&#9733;</span>
                   <span class="star" onclick="setRating(2,11)">&#9733;</span>
                   <span  class="star" onclick="setRating(3,11)">&#9733;</span>
                   <span  class="star" onclick="setRating(4,11)">&#9733;</span>
                    <span  class="star" onclick="setRating(5,11)">&#9733;</span>
                </div>
                <p class="description"> A Thousand Splendid Suns and The New York Times: Middle Eastern Women </p>
                <div><span class="price">12.8£</span> <button class="button">add to cart</button></div>


        </div>

        <div class="grid-item">
                <img src="imageR/wuthering.jpg"  id="image">
                <p class="title" >Wuthering Heights</p>
                <div class="rating12">
                   <span  class="star" onclick="setRating(1,12)">&#9733;</span>
                   <span  class="star" onclick="setRating(2,12)">&#9733;</span>
                   <span  class="star" onclick="setRating(3,12)">&#9733;</span>
                   <span class="star" onclick="setRating(4,12)">&#9733;</span>
                    <span class="star" onclick="setRating(5,12)">&#9733;</span>
                </div>
                <p class="description">Wuthering Heights: [Annotated Edition – Bonus: Emily Brontë's Biography and Historical Context] </p>
                <div><span class="price">9.48£</span> <button class="button">add to cart</button></div>


        </div>


        <a href="cart.php" > view cart </a>


    </div>
    


<script>

function setRating(rating,i){
        
  const stars = document.querySelectorAll(`.rating${i} .star`);

  // Iterate over each star, setting its state appropriately
  stars.forEach((star, index) => {

    if (index < rating) {
      star.classList.add('rated');
    } else {
      star.classList.remove('rated');
    }
   
  });}



</script>
        
    
</body>
</html>
