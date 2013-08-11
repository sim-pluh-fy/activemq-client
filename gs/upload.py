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


image = sys.argv[1]
bucket_name = sys.argv[2]

bucket = conn.get_bucket(bucket_name)
fpic = Key(bucket)
contents = constants.TMP_DIR+image
fpic.key = image
fpic.set_contents_from_filename(contents,{},replace=True)
