#Test login page

import logging
FORMAT='%(asctime)-15s %(message)s'
logging.basicConfig(format=FORMAT)
logger=logging.getLogger('')

#Test all fields empty
click("1681983825146.png")
click("1682082619412.png")
if not exists("1682082753770.png"):
    logger.warning('user must complete mdp not display')
else :
    logger.warning('test login : fields empty ok')

#Test mdp field empty
click("1681983825146.png")

click(Pattern("1682082674456.png").targetOffset(-2,15))
type('123@test.com')
click("1682082619412.png")
if not exists("1682089236214.png"):
    logger.warning('user must complete mdp not display')
else :
    logger.warning('test login : mdp field empty ok')

#Test wrong email format, no @ written
click("1681983825146.png")

click(Pattern("1682082674456.png").targetOffset(-2,15))
type('123')

click("1682082619412.png")
if not exists("1682089204902.png"):
    logger.warning('pop up mail must contain @ etc not displayed')
else :
    logger.warning('test login : wrong mail format ok')

#Test wrong mail and mdp combinaison
click("1681983825146.png")
click(Pattern("1682082674456.png").targetOffset(-2,15))
type('test@123.com')
click (Pattern("1682082839400.png").targetOffset(5,67))
type('test')
click("1682082619412.png")
if not exists("1682083230531.png"):
    logger.warning('error not displayed')
else :
    logger.warning('test login : mail and mdp combinaison ok')
    
click("1682083247022.png")
if exists("1682083230531.png"):
    logger.warning('error still displayed, pb')
else :
    logger.warning('test login : delete pop up ok')

#Test enter valid mail and mdp
click(Pattern("1682082674456.png").targetOffset(-2,15))
type('ad@admin.fr')
click (Pattern("1682082926366.png").targetOffset(-1,17))
type('123')
click("1682082619412.png")

if not exists("1681987628155.png"):
    logger.warning('error still displayed, pb')
else :
    logger.warning('test login : valid mail and mdp up ok')
logger.warning('test finished !!')