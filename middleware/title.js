function dynamicTitle(page_title) {
    return function(req, res, next){
        res.locals.html= true;
        res.locals.title= `${page_title} | ${process.env.APP_NAME}`
        res.locals.errors={}
        res.locals.data={}
        res.locals.userLogedIn={}
        next();
    }
}

module.exports= dynamicTitle