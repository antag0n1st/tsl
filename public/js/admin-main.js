function containsCyrilic(str){
    var allLetters = "абвгдѓежзѕијклљмнњопрстќуфхцџчш";
    
    str = str.toLowerCase();
    //console.log(str);
    for(i = 0; i < allLetters.length; i++){
        currentChar = allLetters.charAt(i);
        if( str.indexOf(currentChar) > -1 ){ // contains cyrilic
            return true;
        }  
        //console.log(currentChar);
    }
    return false;
    
    
}



function getFileName(fullPath){
    return fullPath.substring( fullPath.lastIndexOf('\\') + 1  );
}