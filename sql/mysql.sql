# $Id $
CREATE TABLE ghost_firsttable (
  ghost_id int(5) unsigned NOT NULL auto_increment,
  name varchar(30) NOT NULL default '',
  address varchar(30) NOT NULL default '',
  telephone varchar(30) NOT NULL default '',
  email varchar(30) NOT NULL default '',
  PRIMARY KEY  (ghost_id),
  KEY name (name)
) ENGINE=MyISAM;