import StringIO
import string
import json
import urllib
import os,sys,boto
from boto.gs.connection import GSConnection
from boto.s3.key import Key
import constants

# make connection to Google
conn = boto.connect_gs(constants.GS_ACCESS_KEY,constants.GS_SECRET_KEY)

in_message = sys.argv[1]

message = json.loads(urllib.unquote(in_message))
primary = message['primary']
image = message['image']

bucket = conn.get_bucket(primary)
fpic = Key(bucket)
fpic.key = image
fpic.get_contents_to_filename(constants.TMP_DIR+image)






