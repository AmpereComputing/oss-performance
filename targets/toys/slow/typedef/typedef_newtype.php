<?hh
namespace slowtypedeftypedefnewtype;

newtype UserID = int;

function make_user_id(UserId $id): UserID { return $id; }
