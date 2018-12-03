conn = new Mongo();
db = conn.getDB("db_test");
db.tb_users.insert({ "username": "admin", "password": "flag{djhd-fhei3-29ij-9iok}"})
db.tb_users.insert({ "username": "test", "password": "test"})
db.tb_users.insert({ "username": "user", "password": "123456"})