<?php
/* 
 * "About" text for the home page
 * Copyright 2017 Frederick CUPPS
 */
?>
    <div id="content">
        <h3>
            Welcome to the 
            <a href="https://en.wikipedia.org/wiki/Margot_Adler">
                Margot Adler
            </a>
            Library.
        </h3>
        <table>
            <tr>
                <td>
                    This library is a research collection of texts, periodicals, 
                    and other media related Earth Centered Spirituality and Pagan belief systems.
                    <br /><br />
                    The library will be available for browsing soon in Frederick, MD.  
                    <br /><br />
                    We can expand from there, of course.
                </td>
                <td>
                    <?php 
                        $i = rand(1,8);
                        switch ($i) {
                            case 1:
                                echo "<img src='images/MargotAdlerImage01.jpg' width='240'>";
                                break;
                            case 2:
                                echo "<img src='images/MargotAdlerImage02.jpg' width='240'>";
                                break;
                            case 3:
                                echo "<img src='images/MargotAdlerImage03.jpg' width='240'>";
                                break;
                            case 4:
                                echo "<img src='images/MargotAdlerImage04.jpg' width='240'>";
                                break;
                            case 5:
                                echo "<img src='images/MargotAdlerImage05.jpg' width='240'>";
                                break;
                            case 6:
                                echo "<img src='images/MargotAdlerImage06.jpg' width='240'>";
                                break;
                            case 7:
                                echo "<img src='images/MargotAdlerImage07.jpg' width='240'>";
                                break;
                            case 8:
                                echo "<img src='images/MargotAdlerImage08.jpg' width='240'>";
                                break;                            
                        }
                    ?>
                </td>
            </tr>
          <tr>
                <td colspan="2">
                    <?php 
                        $quoteText = "";
                        $i = rand(1,12);
                        switch ($i) {
                            case 1:
                                $quoteText = "The first time I called myself a &apost;Witch&apost; was the most magical moment of my life.";
                                break;
                            case 2:
                                $quoteText = "The spiritual world is not unlike the natural world: only diversity will save it.";
                                break;
                            case 3:
                                $quoteText = "We are not evil. We don't harm or seduce people."
                                            . " We are not dangerous. We are ordinary people like you."
                                            . " We have families, jobs, hopes, and dreams."
                                            . " We are not a cult. This religion is not a joke."
                                            . " We are not what you think we are from looking at T.V."
                                            . " We are real. We laugh, we cry. We are serious."
                                            . " We have a sense of humour. You don't have to be afraid of us."
                                            . " We don't want to convert you."
                                            . " And please don't try to convert us."
                                            . " Just give us the same right we give you &mdash; to live in peace."
                                            . " We are much more similar to you than you think.";
                                break;
                            case 4:
                                $quoteText = "The purpose of ritual is to change the mind of the human being."
                                            . " It's a sacred drama in which you are the audience as well as the participant,"
                                            . " and the purpose of it is to activate the parts of the mind that are not activated"
                                            . " by everyday activity ... &apost;Magic&apost; becomes the development of techniques"
                                            . " that allow communication with hidden portions of the self, and with hidden portions"
                                            . " of all other islands in this &apost;psychic sea.&apost;";
                                break;
                            case 5:
                                $quoteText = "We are all part of the life cycle."
                                            . " Like a seed we are born, we sprout, we grow, we mature and decay,"
                                            . " making room for future generations who, like seedlings, are reborn"
                                            . " through us. As for the persistence of consciousness, deep down,"
                                            . " I thought, 'How can we know?' Perhaps we simply return to the elements;"
                                            . " we become earth and air and fire and water. That seemed all right to me.";
                                    
                                break;
                            case 6:
                                $quoteText = "The idea of polytheism is grounded in the view that reality (divine or otherwise) is multiple and diverse... Polytheism has allowed a multitude of distinct groups to exist more or less in harmony, despite great divergence in beliefs and practices.";
                                break;
                            case 7:
                                $quoteText = "The Gods and Goddesses of myth, legend and fairy tale represent archetypes, real potencies and potentialities deep within the psyche, which, when allowed to flower permit us to be more fully human.";
                                break;
                            case 8:
                                $quoteText = "The Neo-Pagan religious framework is based on a polytheistic outlook- a view that allows differing perspectives and ideas to coexist";
                                break;
                            case 9:
                                $quoteText = "The most authentic and hallowed Wiccan tradition is stealing from any source that didn't run away too fast";
                                break;
                            case 10:
                                $quoteText = "I don’t believe in objectivity, but I do believe deeply in fairness.";
                                break;
                            case 11:
                                $quoteText = "Vampires let us play with death and the issue of mortality. They let us ponder what it would mean to be truly long lived. Would the long view allow us to see the world differently, imagine social structures differently? Would it increase or decrease our reverence for the planet? Vampires allow us to ask questions we usually bury.";
                                break;
                            case 12:
                                $quoteText = "A number of studies of homeless youth in big cities put forth a startling statistic: Depending on the study, somewhere between 30 and 40 percent of homeless youths identify as lesbian, gay, bisexual or transgender.";
                                break;
                        }
                        echo "<div id='greenbar'>";
                        echo $quoteText;
                        echo "&nbsp;&mdash;Margot Adler";
                        echo '</div>';
                    ?>
                </td>
            </tr>            
<!--                <tr><td>
                    <img src='images/MargotAdlerImage01.jpg' width='240'>
                </td></tr>   
                <tr><td>                                
                    <img src='images/MargotAdlerImage02.jpg' width='240'>
                </td></tr>   
                <tr><td>                                
                    <img src='images/MargotAdlerImage03.jpg' width='240'>
                </td></tr>   
                <tr><td>                                
                    <img src='images/MargotAdlerImage04.jpg' width='240'>
                </td></tr>   
                <tr><td>                                
                    <img src='images/MargotAdlerImage05.jpg' width='240'>
                </td></tr>   
                <tr><td>                                
                        <img src='images/MargotAdlerImage06.jpg' width='240'>
                </td></tr>   
                <tr><td>                                
                    <img src='images/MargotAdlerImage07.jpg' width='240'>
                </td></tr>   
                <tr><td>                                
                    <img src='images/MargotAdlerImage08.jpg' width='240'>
                </td></tr>   
            <tr>
                <tr><td>
                    <img src='images/MargotAdlerQuote01.jpg' width='900'>
                </td></tr>   
                <tr><td>                                
                    <img src='images/MargotAdlerQuote02.jpg' width='900'>
                </td></tr>   
                <tr><td>                                
                    <img src='images/MargotAdlerQuote03.jpg' width='900'>
                </td></tr>   
                <tr><td>                                
                    <img src='images/MargotAdlerQuote04.jpg' width='900'>
                </td></tr>   
                <tr><td>                                
                    <img src='images/MargotAdlerQuote05.jpg' width='900'>
                </td></tr>   
                <tr><td>                                
                    <img src='images/MargotAdlerQuote06.jpg' width='900'>
                </td></tr>   
            -->
        </table>
    </div>
