/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function() { 
    $('#tx_simulatefe_show').click(function(){
        $(this).fadeOut();
        $('#tx_simulatefe').fadeIn()        
        $('#tx_simulatefe_hide').fadeIn();
    });
    $('#tx_simulatefe_hide').click(function(){
        $(this).fadeOut();
        $('#tx_simulatefe').fadeOut()        
        $('#tx_simulatefe_show').fadeIn();
    });
});