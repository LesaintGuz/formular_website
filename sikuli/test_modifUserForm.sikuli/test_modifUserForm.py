#Test modifUser page
#must start on userFormPage
#connected with admin account
#with all fields empty exept date one

import logging
FORMAT='%(asctime)-15s %(message)s'
logging.basicConfig(format=FORMAT)
logger=logging.getLogger('')

def fillFirstName(text):
    click(Pattern("1682060433774.png").targetOffset(156,5))
    doubleClick(Pattern("1682060433774.png").targetOffset(153,10))
    type(text)
    click("1682019097657.png")
    click("1682019097657.png")
    click("1682019097657.png")
    click("1682019161460.png")
    log = 'test modifUser : fill first name with ' 
    log += text
    if exists("1682019585737.png"):
        log +=' ok'
    else :
        log +=' fail'
    logger.warning(log)
    click("1682019298416.png")
    click("1682019298416.png")
    click("1681983825146-1.png")

def fillName(text):
    doubleClick(Pattern("1682060433774.png").targetOffset(-161,12))
    type(text)
    click("1682019097657.png")
    click("1682019097657.png")
    click("1682019097657.png")
    click("1682019161460.png")
    log = 'test modifUser : fill name with ' 
    log += text
    if exists("1682019585737.png"):
        log +=' ok'
    else :
        log +=' fail'
    logger.warning(log)
    click("1682019298416.png")
    click("1682019298416.png")
    click("1681983825146-1.png")


def testSuccess(text, img, fieldtoTest):
    doubleClick(img)
    type(text)
    click("1682019097657.png")
    click("1682019097657.png")
    click("1682019097657.png")
    click("1682019161460.png")
    log = 'test modifUser : '
    log += fieldtoTest
    log += ' with '
    log += text 
    if exists("1682061207586.png"):
        logger.warning('test modifUser : name containing - ok')
        click("1682061378725.png")
    else :
        logger.warning('test modifUser : name containing - fail')

    click("1682019298416.png")
    click("1682019298416.png")
    click("1681983825146-1.png")

def testPhone(text):
    doubleClick(Pattern("1682065651104.png").targetOffset(-2,21))
    type(text)
    click("1682019097657.png")
    click("1682019097657.png")
    click("1682019097657.png")
    click("1682019161460.png")
    log = 'test modifUser : fill phone with ' 
    log += text
    if exists("1682019585737.png"):
        log +=' ok'
    else :
        log +=' fail'
    logger.warning(log)
    click("1682019298416.png")
    click("1682019298416.png")
    click("1681983825146-1.png")
    
def testNumSecu(text):
    doubleClick(Pattern("1682065906842.png").targetOffset(-4,16))
    type(text)
    click("1682019097657.png")
    click("1682019097657.png")
    click("1682019161460.png")
    log = 'test modifUser : fill numSecu with ' 
    log += text
    if exists("1682019585737.png"):
        log +=' ok'
    else :
        log +=' fail'
    logger.warning(log)
    click("1682019298416.png")
    click("1682019298416.png")
    click("1681983825146-1.png")

def testAdresse(text):
    doubleClick(Pattern("1682066627609.png").targetOffset(1,15))
    type(text)
    click("1682019097657.png")
    click("1682019097657.png")
    click("1682019097657.png")
    click("1682019161460.png")
    log = 'test modifUser : fill adresse with ' 
    log += text
    if exists("1682019585737.png"):
        log +=' ok'
    else :
        log +=' fail'
    logger.warning(log)
    click("1682019298416.png")
    click("1682019298416.png")
    click("1681983825146-1.png")

def testPostalCode(text):
    doubleClick(Pattern("1682067541012.png").targetOffset(-3,21))
    type(text)
    click("1682019097657.png")
    click("1682019097657.png")
    click("1682019097657.png")
    click("1682019161460.png")
    log = 'test modifUser : fill postal code with ' 
    log += text
    if exists("1682019585737.png"):
        log +=' ok'
    else :
        log +=' fail'
    logger.warning(log)
    click("1682019298416.png")
    click("1682019298416.png")
    click("1681983825146-1.png")

def testCity(text):
    doubleClick(Pattern("1682068214810.png").targetOffset(-2,17))
    type(text)
    click("1682019097657.png")
    click("1682019097657.png")
    click("1682019097657.png")
    click("1682019161460.png")
    log = 'test modifUser : fill city with ' 
    log += text
    if exists("1682019585737.png"):
        log +=' ok'
    else :
        log +=' fail'
    logger.warning(log)
    click("1682019298416.png")
    click("1682019298416.png")
    click("1681983825146-1.png")

#Test Name field
doubleClick(Pattern("1682060433774.png").targetOffset(-161,12))
type(Key.DELETE)
click("1682019097657.png")
click("1682019097657.png")
click("1682019097657.png")
click("1682019161460.png")
if exists("1682086241621.png"):
    logger.warning('test modifUser : nothing written ok')
else :
    logger.warning('test modifUser : nothing written fail')

click("1682019298416.png")
click("1682019298416.png")
click("1681983825146-1.png")

#Test name
fillName('154')
fillName('ad154')
fillName(' ')
fillName('ad ')
fillName(' ad')
fillName('ad"m')
fillName('ad&m')
fillName('ad~m')
fillName('ad"m')
fillName('ad(m')
fillName('ad|m')
fillName('@dm')
fillName('ad{}m')
fillName('ad_m')
fillName('ad/m')
fillName('ad+m')
fillName('ad=m')
fillName('ad[')
fillName('ad^^')
fillName('ad%')
fillName('ad-')
fillName('-ad%')
fillName('ad$')
fillName('ad€')
fillName('adm!n')
fillName('ad?m')
fillName('ad*')
fillName('ad.m')
fillName('ad,')
fillName('ad;m')
fillName('ad:m')

#Test firstName
fillFirstName(Key.DELETE)
fillFirstName(' ad')
fillFirstName('ad ')
fillFirstName('-ad')
fillFirstName('123')
fillFirstName('ad-')
fillFirstName('a_d')
fillFirstName(')ad')
fillFirstName('=ad')
fillFirstName('+ad')
fillFirstName('*ad')
fillFirstName('a:d')
fillFirstName('a,d')
fillFirstName(';ad')
fillFirstName('ad!')
fillFirstName('a~d')
fillFirstName('#ad')
fillFirstName('$ad')
fillFirstName('"ad')
fillFirstName('a1d')
fillFirstName('@d')
fillFirstName('a{d')
fillFirstName('ad&a')

#Test phone
testPhone(Key.DELETE)
testPhone('ad')
testPhone(' ')
testPhone(' ad')
testPhone('ad12')
testPhone('adbcdgefop')
testPhone('adbcdg-fop')
testPhone('11558ab922')
testPhone('11558*4922')
testPhone(' 15583592')
testPhone('15583592 ')
testPhone('155 83592')
testPhone('123')

#Test num secu
testNumSecu(Key.DELETE)
testNumSecu(' ')
testNumSecu('ad')
testNumSecu('ad12')
testNumSecu('abcdefghuijlkre')
testNumSecu('abcdefghui12kre')
testNumSecu('abcdefghuijlkr8')
testNumSecu('7bcdefghuijlkre')
testNumSecu('9bcdefghuijlkr7')
testNumSecu('1234567*8912345')
testNumSecu('1234567 8912345')
testNumSecu(' 12345678912345')
testNumSecu('12345678912345 ')

#Test adresse
testAdresse(Key.DELETE)
testAdresse(' ')
testAdresse('32 rue ')
testAdresse('32 rue *')
testAdresse('32 rue +t')
testAdresse('32 rue =o')
testAdresse('32 rue -')
testAdresse('-32 rue')
testAdresse('32 rue?')
testAdresse('32 rue@')
testAdresse('32 rue%')
testAdresse(' 32 rue')
testAdresse(' 25')

#Test postal code
testPostalCode(Key.DELETE)
testPostalCode(' ')
testPostalCode('123')
testPostalCode('7895a')
testPostalCode('7895 ')
testPostalCode(' 7895')
testPostalCode('78 95')
testPostalCode('78-95')
testPostalCode('-7895')
testPostalCode('7896$')
testPostalCode('a7895')
testPostalCode('78a95')
            
#Test city
testCity(Key.DELETE)
testCity(' ad')
testCity('ad ')
testCity('-ad')
testCity('123')
testCity('ad-')
testCity('a_d')
testCity(')ad')
testCity('=ad')
testCity('+ad')
testCity('*ad')
testCity('a:d')
testCity('a,d')
testCity(';ad')
testCity('ad!')
testCity('a~d')
testCity('#ad')
testCity('$ad')
testCity('"ad')
testCity('a1d')
testCity('@d')
testCity('a{d')
testCity('ad&a')


#test succeed
testSuccess('jean Paul', Pattern("1682060433774.png").targetOffset(156,12), 'name field')

testSuccess('jean-Paul', Pattern("1682060433774.png").targetOffset(-161,12), 'name field')
testSuccess('jean Paul', Pattern("1682060433774.png").targetOffset(-161,12), 'name field')
testSuccess('jean', Pattern("1682060433774.png").targetOffset(-161,12), 'name field')

testSuccess('jean-Paul', Pattern("1682060433774.png").targetOffset(156,12), 'name field')

testSuccess('jean', Pattern("1682060433774.png").targetOffset(156,12), 'name field')

testSuccess('jean Paul', Pattern("1682060433774.png").targetOffset(156,12), 'name field')

testSuccess('jean-Paul', Pattern("1682060433774.png").targetOffset(-161,12), 'name field')
testSuccess('jean Paul', Pattern("1682060433774.png").targetOffset(-161,12), 'name field')
testSuccess('jean', Pattern("1682060433774.png").targetOffset(-161,12), 'name field')

testSuccess('jean-Paul', Pattern("1682060433774.png").targetOffset(156,12), 'first name field')

testSuccess('jean', Pattern("1682060433774.png").targetOffset(156,12), 'first name field')


