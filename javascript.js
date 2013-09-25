function charactersleft(tweet) {
	var url, i, lenUrlArr;
	var virtualTweet = tweet;
	var filler = "01234567890123456789";
	var extractedUrls = twttr.txt.extractUrlsWithIndices(tweet);
	var remaining = 140;
	lenUrlArr = extractedUrls.length;
	if ( lenUrlArr > 0 ) {
		for (var i = 0; i < lenUrlArr; i++) {
			url = extractedUrls[i].url;
			virtualTweet = virtualTweet.replace(url,filler);
		}
	}
	remaining = remaining - virtualTweet.length;
	return remaining;
}
function update_char_remain(source, destination){
	
	document.getElementById(destination).innerHTML = charactersleft(document.getElementById(source).value);
}
function validate_length(form){
	if(charactersleft(document.getElementById(form).value) < 0){
		return confirm('You have used more than 140 characters. Continue?');
	}
}