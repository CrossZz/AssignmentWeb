/*
 * Mục Đích:
 * Chứa thông tin du lieu
 */

function User(
  _userId,
  _userName,
  _userPhone,
  _userEmail,
  _userPassword,
  _userAddress,
  _userRole
) {
  //Thuộc tính
  //Key= value
  this.Id = _userId;
  this.userName = _userName;
  this.userPhone = _userPhone;
  this.userEmail = _userEmail;
  this.userPassword = _userPassword;
  this.userAddress = _userAddress;
  this.userRole = _userRole;
}

function Product(
  _pId,
  _bId,
  _pName,
  _pPrice,
  _pDescription,
  _pDetail,
  _pImage
) {
  this.Id = _pId;
  this.bId = _bId;
  this.pName = _pName;
  this.pPrice = _pPrice;
  this.pDescription = _pDescription;
  this.pDetail = _pDetail;
  this.pImage = _pImage;
}

function News(_nId, _nName, _nDescription, _nDetail, _nImage) {
  this.Id = _nId;
  this.nName = _nName;
  this.nDescription = _nDescription;
  this.nDetail = _nDetail;
  this.nImage = _nImage;
}

function Appointment(_aId, _uId, _aState, _aDate) {
  this.Id = _aId;
  this.uId = _uId;
  this.aState = _aState;
  this.aDate = _aDate;
}

function Brand(_bId, _bName, _bContent, _bImage) {
  this.Id = _bId;
  this.bName = _bName;
  this.bContent = _bContent;
  this.bImage = _bImage;
}

function Images(_iId, _iName, _iImage) {
  this.Id = _iId;
  this.iName = _iName;
  this.iImage = _iImage;
}

function Service(_sId, _sName, _sDescription, _sContent, _sImage) {
  this.Id = _sId;
  this.sName = _sName;
  this.sDescription = _sDescription;
  this.sContent = _sContent;
  this.sImage = _sImage;
}
