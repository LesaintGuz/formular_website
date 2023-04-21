#Test register page
#must start on login page

import logging
FORMAT='%(asctime)-15s %(message)s'
logging.basicConfig(format=FORMAT)
logger=logging.getLogger('')

#Test go register
click("1682078671188.png")
if exists("1681990916923.png"):
    logger.warning('test register : go register ok')
else :
    logger.warning('test register : go register fail')

#Test nothing written
click("1682078693891.png")
if exists("1682078788379.png"):
    logger.warning('test register : nothing written ok')
else :
    logger.warning('test register : nothing written fail')

#Test unvalid mail
click("1681983825146-1.png")
click(Pattern("1682078836887.png").targetOffset(0,12))
type('userTest')
click("1682078877433.png")
if exists("1682078918870.png"):
    logger.warning('test register : unvalid mail ok')
else :
    logger.warning('test register : unvalid mail fail')

#Test no mdp
click("1681983825146.png")
click(Pattern("1682078836887.png").targetOffset(0,12))
type('userTest@mail.com')
click("1682078877433.png")
if exists("1682078788379.png"):
    logger.warning('test register : no mdp ok')
else :
    logger.warning('test register : no mdp fail')

#Test go connexion
click("1682078948451.png")
if exists("1682010499575.png"):
    logger.warning('test register : go connexion ok')
else :
    logger.warning('test register : go connexion fail')

click("1682078671188.png")

#Test no mail
click (Pattern("1682079004962.png").targetOffset(0,15))
type('mdpTest')
click("1682078877433.png")
if exists("1682078788379.png"):
    logger.warning('test register : no mail ok')
else :
    logger.warning('test register : no mail fail')

#Test mail and mdp invalide
click("1681983825146.png")
click (Pattern("1682079004962.png").targetOffset(0,15))
type('mdpTest')
click(Pattern("1682078836887.png").targetOffset(0,12))
type('ad@admin.fr')
click("1682078877433.png")
if not exists("1682084955183.png"):
    logger.warning('test register : no mdp and mail valide ok')
else :
    logger.warning('test register : no mdp and mail valide fail')

#Test mail and mdp valide
click("1681983825146.png")
click (Pattern("1682079004962.png").targetOffset(0,15))
type('mdpTest')
click(Pattern("1682078836887.png").targetOffset(0,12))
type('userTest@test.com')
click("1682078877433.png")
if exists("1682079498382.png"):
    logger.warning('test register : no mdp and mail valide ok')
else :
    logger.warning('test register : no mdp and mail valide fail')

#validate user
click(Pattern("1682078836887.png").targetOffset(0,12))
type('ad@admin.fr')
click (Pattern("1682079004962.png").targetOffset(0,15))
type('123')
click("1682079114486.png")
if exists("1681994651187.png"):
    logger.warning('test register : validate user admin co ok')
else :
    logger.warning('test register :  : validate user admin co fail')

click("1682085149211.png")

click(Pattern("1682078545684.png").targetOffset(191,0))
click("1682078585215.png")

click(Pattern("1682078836887.png").targetOffset(0,12))
type('userTest@test.com')
click (Pattern("1682079004962.png").targetOffset(0,15))
type('mdpTest')
click("1682079114486.png")
if exists("1681995926919.png"):
    logger.warning('test register : validate user ok')
else :
    logger.warning('test register :  : validate user fail')

logger.warning('test register : tests finished !!')
