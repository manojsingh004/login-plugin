var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches

// jQuery(function(){jQuery(".next").click(function(){
// 	if(animating) return false;
// 	animating = true;
	
// 	current_fs = jQuery(this).parent();
// 	next_fs = jQuery(this).parent().next();
	
// 	//activate next step on progressbar using the index of next_fs
// 	jQuery("#progressbar li").eq(jQuery("fieldset").index(next_fs)).addClass("active");
	
// 	//show the next fieldset
// 	next_fs.show(); 
// 	//hide the current fieldset with style
// 	current_fs.animate({opacity: 0}, {
// 		step: function(now, mx) {
// 			//as the opacity of current_fs reduces to 0 - stored in "now"
// 			//1. scale current_fs down to 80%
// 			scale = 1 - (1 - now) * 0.2;
// 			//2. bring next_fs from the right(50%)
// 			left = (now * 50)+"%";
// 			//3. increase opacity of next_fs to 1 as it moves in
// 			opacity = 1 - now;
// 			current_fs.css({'transform': 'scale('+scale+')'});
// 			next_fs.css({'left': left, 'opacity': opacity});
// 		}, 
// 		duration: 800, 
// 		complete: function(){
// 			current_fs.hide();
// 			animating = false;
// 		}, 
// 		//this comes from the custom easing plugin
// 		easing: 'easeInOutBack'
// 	});
// });

// jQuery(".previous").click(function(){
// 	if(animating) return false;
// 	animating = true;
	
// 	current_fs = jQuery(this).parent();
// 	previous_fs = jQuery(this).parent().prev();
	
// 	//de-activate current step on progressbar
// 	jQuery("#progressbar li").eq(jQuery("fieldset").index(current_fs)).removeClass("active");
	
// 	//show the previous fieldset
// 	previous_fs.show(); 
// 	//hide the current fieldset with style
// 	current_fs.animate({opacity: 0}, {
// 		step: function(now, mx) {
// 			//as the opacity of current_fs reduces to 0 - stored in "now"
// 			//1. scale previous_fs from 80% to 100%
// 			scale = 0.8 + (1 - now) * 0.2;
// 			//2. take current_fs to the right(50%) - from 0%
// 			left = ((1-now) * 50)+"%";
// 			//3. increase opacity of previous_fs to 1 as it moves in
// 			opacity = 1 - now;
// 			current_fs.css({'left': left});
// 			previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
// 		}, 
// 		duration: 800, 
// 		complete: function(){
// 			current_fs.hide();
// 			animating = false;
// 		}, 
// 		//this comes from the custom easing plugin
// 		easing: 'easeInOutBack'
// 	});
// });

// jQuery(".submit").click(function(){
// 	return false;
// });
// });


// function colorInput()
// {
//   	document.getElementById("inputTankAIrr").style.border="2px solid red";
// }

$('form input').keydown(function (e) {
    if (e.keyCode == 13) {
        e.preventDefault();
        return false;
    }
});

var lastUpdate = new Date();
var i = 0;
var temp;
window.addEventListener('wheel', function(e){
    var thisUpdate = new Date();
    if( thisUpdate - lastUpdate < 750 ) {
        e.preventDefault();
        e.stopPropagation();
        return;
    }
    lastUpdate = thisUpdate;


	//activate next step on progressbar using the index of next_fs
	
	
  
    var numBlocks = $('[data-slide]').length,
        $curBlock = $('[data-slide].active'),
        curBlockNum = $curBlock.data('slide');


		var list_pro= document.querySelectorAll('ul#progressbar li');
	
	
		console.log(list_pro);
		

        var delta = e.deltaY;
		
        if (delta < 0) { //scroll up
			if(i!=0 && i<0){
				if(i>=list_pro.length){
					
					i--;
				}
				list_pro[i].classList.remove('active');
				i--;
				
			}
          if(curBlockNum != 1) {
	        		var $prevBlock = $curBlock.prev(),
	        			  prevBlockNum = $prevBlock.data('slide');
						  
	        		$curBlock.removeClass('active prev-slide').addClass('next-slide');
	        		$prevBlock.addClass('active').removeClass('prev-slide next-slide');
					
					
				
          }

			} else if (delta > 0) { //scroll down
				
				if(i<list_pro.length ){
						i++;
						console.log(list_pro[i]);
	
						list_pro[i].classList.add('active');
					
					}


				  if(curBlockNum < numBlocks) {

					
	        		var $nextBlock = $curBlock.next(),
	        			  nextEffect = $nextBlock.data('effect');

	        		$curBlock.removeClass('active next-slide').addClass('prev-slide');
	        		$nextBlock.addClass('active').removeClass('prev-slide next-slide');


					$("#progressbar li").eq($(".slider-container>div").index(next_fs)).addClass("active");
					

					
				

          }

			}

  
});


$('form input').keydown(function (e) {
    if (e.keyCode == 13) {
        e.preventDefault();
        return false;
// 		var list_pro= document.querySelectorAll('ul#progressbar li');
// 		if(i<list_pro.length ){
			
// 			if(!list_pro[list_pro.length].classList.contains('active')){
// 						i++;
// 			}
// 						console.log(list_pro[i]);
	
// 						list_pro[i].classList.add('active');
					
// 					}

    }
});

document.querySelector('body').addEventListener('keypress', function (e) {
	var numBlocks = $('[data-slide]').length,
	$curBlock = $('[data-slide].active'),
	curBlockNum = $curBlock.data('slide');
	console.log('enter');
    if (e.key === 'Enter') {
		var $nextBlock = $curBlock.next(),
	        			  nextEffect = $nextBlock.data('effect');

	        		$curBlock.removeClass('active next-slide').addClass('prev-slide');
	        		$nextBlock.addClass('active').removeClass('prev-slide next-slide');
		
}
});




function clickSlide(){
	var numBlocks = $('[data-slide]').length,
	$curBlock = $('[data-slide].active'),
	curBlockNum = $curBlock.data('slide');
	console.log('enter');
    
		var $nextBlock = $curBlock.next(),
	        			  nextEffect = $nextBlock.data('effect');

	        		$curBlock.removeClass('active next-slide').addClass('prev-slide');
	        		$nextBlock.addClass('active').removeClass('prev-slide next-slide');
}
var j= 0;

 $(".next").click(function () {
          clickSlide();
	 var list_pro= document.querySelectorAll('ul#progressbar li');
	 
	 if(i<list_pro.length ){
						i++;
						console.log(list_pro[i]);
	
						list_pro[i].classList.add('active');
					
					}
        });

