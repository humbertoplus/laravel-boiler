<?php echo "@extends('app')".PHP_EOL; ?>
<?php echo "@section('content')".PHP_EOL; ?>
<div class="row">
    <div class="col-sm-12">
        <h3>All <?php echo \EveningDesign\Boiler\Support\Helpers::makeHumanFriendly($names->reset()->plural()->get()); ?></h3>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 text-right">
        <a href="<?php echo "<?php echo route(".$names->getNamespacedConstantClass()."::CREATE_ROUTE); ?>"; ?>" class="btn btn-success btn-sm">Add <?php echo \EveningDesign\Boiler\Support\Helpers::makeHumanFriendly($names->reset()->singular()->get()); ?></a>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
@foreach($columns as $column)
                    <th><?php echo \EveningDesign\Boiler\Support\Helpers::makeHumanFriendly($column->Field); ?></th>
@endforeach
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php echo "@foreach(".$names->getPluralInstanceName()." as ".$names->getSingularInstanceName().")".PHP_EOL; ?>
                <tr>
@foreach($columns as $column)
                    <td><?php echo "<?php echo ".$names->getSingularInstanceName()."->".$names->makeWrappedNamespacedColumnConstant($column->Field)."; ?>"; ?></td>
@endforeach
                    <td>
                        <a href="<?php echo "<?php echo route(".$names->getNamespacedConstantClass()."::SHOW_ROUTE, ".$names->getSingularInstanceName()."->".$names->makeWrappedNamespacedColumnConstant('id')."); ?>"; ?>" class="btn btn-default btn-xs">View</a>
                        <a href="<?php echo "<?php echo route(".$names->getNamespacedConstantClass()."::EDIT_ROUTE, ".$names->getSingularInstanceName()."->".$names->makeWrappedNamespacedColumnConstant('id')."); ?>"; ?>" class="btn btn-warning btn-xs">Edit</a>
                        <div style="display: inline-block;">
                            <?php echo "<?php echo Form::open(['method' => 'DELETE', 'route' => [".$names->getNamespacedConstantClass()."::DESTROY_ROUTE, ".$names->getSingularInstanceName()."->".$names->makeWrappedNamespacedColumnConstant('id')."]]); ?>"; ?>
                            <?php echo "<?php echo Form::submit('Delete', ['onClick' => 'return confirm(\\'Are you sure you want to delete this record?\\')', 'class' => 'btn btn-danger btn-xs']); ?>"; ?>
                            <?php echo "<?php echo Form::close(); ?>"; ?>
                        </div>
                    </td>
                </tr>
            <?php echo "@endforeach".PHP_EOL; ?>
            </tbody>
        </table>
    </div>
</div>
<?php echo "@stop".PHP_EOL; ?>
