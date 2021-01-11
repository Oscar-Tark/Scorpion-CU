const dat_ = (e_) =>
{
	var x;
	var _e = '';
	for (x in e_)
		_e += '{&var}'+document.getElementById(e_[x]).value+'{&var_end}';
	c_local.set_local("data", _e);//document.getElementById(e_).value);
	return;
}
