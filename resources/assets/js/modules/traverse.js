// EPIC tree traversal with ES6 generators
// @see https://derickbailey.com/2015/07/19/using-es6-generators-to-recursively-traverse-a-nested-data-structure/
function *traverse (leaf) {
    if (!leaf) return

    for (let i in leaf) {
        let val = leaf[i];
        yield val;

        if (val.children.length) {
            yield *traverse(val.children);
        }
    }
}

export default function (data, callback) {
    var iterator = traverse(data)
    var leaf = iterator.next()
    while (!leaf.done) {
        callback(leaf.value)
        leaf = iterator.next()
    }
}
