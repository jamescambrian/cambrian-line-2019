
<div id="player__mini--light">
            <div id="audio-image">
       <!--  <img class="cover" /> -->
    </div>
    <div id="audio-player">
         <div class="player__buttons">
   
            <button id="play"></button>
            <button id="pause"></button>
         
         </div>
         <div class="playlist__container fade-in-element">
            <ul id="player--playlist" class="hidden">
                <li song="<?php echo $trackurl;?>" artist=""><?php $key="camplayer_title"; echo get_post_meta($post->ID, $key, true); ?></li>
            </ul>      </div>
            <div id="tracker">
                <div id="progressBar">
                    <span id="progress"></span>
                </div>
            </div>
   
         
    </div>
</div>


<!-- Download it-->
<?php echo "<a class=".'button__download'." href='$trackurl'>Download</a><br>";?> 