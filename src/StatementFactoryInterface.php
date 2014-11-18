<?php
/**
 * Created by IntelliJ IDEA.
 * User: xanderguzman
 * Date: 11/14/14
 * Time: 1:31 PM
 */

namespace SliQ;


interface StatementFactoryInterface
{
    /**
     * @return SelectStatement
     */
    public function select();

    /**
     * @return DeleteStatement
     */
    public function delete();

    /**
     * @return UpdateStatement
     */
    public function update();

    /**
     * @return InsertStatement
     */
    public function insert();
} 